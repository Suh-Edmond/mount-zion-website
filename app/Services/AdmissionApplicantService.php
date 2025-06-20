<?php /** @noinspection ALL */

namespace App\Services;

use App\Constant\AdmissionStatus;
use App\Constant\FileStorageConstants;
use App\Constant\FileUploadCategory;
use App\Constant\UserType;
use App\Exceptions\BusinessValidationException;
use App\Interface\AdmissionApplicantInterface;
use App\Mail\AdmissionAcceptanceMail;
use App\Mail\AdmissionMail;
use App\Mail\AdmissionRejectionMail;
use App\Models\Admission;
use App\Models\AdmissionDocument;
use App\Models\AdmissionYear;
use App\Models\Program;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AdmissionApplicantService implements AdmissionApplicantInterface
{
    private AdmissionDocumentService $admissionDocumentService;

    public function __construct(AdmissionDocumentService $admissionDocumentService)
    {
        $this->admissionDocumentService = $admissionDocumentService;
    }



    public function getApplicants($request)
    {
        $school_filter = $request['school_filter'];
        $session_filter = $request['session_filter'];
        $year_filter    = $request['year_filter'];
        $sort           = $request['sort'];

        $admissions =  Admission::select('*');
        if(isset($school_filter)){
            $admissions = $admissions->whereHas('program', function ($query) use ($school_filter){
                $query->where('school_id', $school_filter);
            });
        }
        if(isset($year_filter)){
            $admissions = $admissions->whereHas('admissionYear', function ($query) use ($year_filter){
                $query->where('year', $year_filter);
            });
        }
        if (isset($session_filter)){
            $admissions = $admissions->whereHas('admissionYear', function ($query) use ($session_filter){
                $query->where('slug', $session_filter);
            });
        }
        if (isset($sort)){
            switch ($sort) {
                case 'DATE_DESC':
                    $admissions->orderBy('created_at');
                    break;
                case 'NAME':
                    $admissions = $admissions->whereHas('user', function ($query) use ($sort){
                        $query->orderBy('name');
                    });
                    break;
                default:
                    $admissions->orderByDesc('created_at');
                    break;
            }
        }

        return $admissions->orderBy('created_at', 'DESC')->paginate(10);
    }

    public function showApplicant($request)
    {
        $applicant = Admission::where('slug', $request['slug']);
        return $applicant->firstOrFail();
    }

    public function downloadApplicantFiles($request)
    {
        // TODO: Implement downloadApplicantFiles() method.
    }

    public function deleteApplicant($request)
    {
        $applicant = Admission::where('slug', $request['slug'])->firstOrFail();
        $applicant->delete();
    }

    public function createApplicant($request)
    {
           
        $program = Program::findOrFail($request['program_id']);

        $admissionYear = $program->admissionYears()->where('status', true)->first();

        $applicant = User::where('email', $request['email'])->first();
        
        if(!$admissionYear->status){
            return redirect()->back()->with(['error' => "Admission deadline has expired! Please wait for the next admission session"]);
        }
        if(!isset($applicant)){
            $applicant = User::create([
                'name'              => $request['first_name'].' '.$request['last_name'],
                'email'             => $request->email,
                'password'          => '',
                'telephone'         => $request['telephone'],
                'region'            => $request['region'],
                'address'           => $request['address'],
                'pob'               => $request['pob'],
                'dob'               => $request['dob'],
                'gender'            => $request['gender'],
                'user_type'         => UserType::APPLICANT
            ]);
        }
        $hasApplied = Admission::where('user_id', $applicant['id'])
                     ->where('program_id', $program['id'])
                     ->where('admission_year_id', $admissionYear['id'])->first();
        
        if (!isset($hasApplied)){
             
            $createdAdmission = Admission::create([
                'user_id'           => $applicant['id'],
                'admission_year_id' => $admissionYear['id'],
                'program_id'        => $program['id']
            ]);

            
            $this->uploadAdmissionDocument($request, $createdAdmission);

            $this->sendAdmissionEmails($applicant, $program);
        }
    }

    public function validateApplication($request)
    {
        $application = Admission::where('slug', $request['slug'])->firstOrFail();
        $application->update([
            'applicant_status' => $request['applicant_status']
        ]);
 
        $application->refresh();
         
        if(AdmissionStatus::ADMITTED == $application->applicant_status){
            $this->sendAcceptanceAdmissionEmails($application);
        }
        if(AdmissionStatus::REJECTED == $application->applicant_status){
            $this->sendRejectionEmails($application);
        }
    }

    private function sendAcceptanceAdmissionEmails($application){
        $emailData = [
            'name'          => $application->user->name,
            'email'         => $application->user->email,
            'program'       => $application->program->name,
            'school'        => $application->program->school->name,
            'school_email'  => $application->program->school->email,
            'school_telephone' => $application->program->school->telephone,
            'website'          => env('APP_URL'),
            'director_name'    => env('DIRECTOR_BDA_NAME'),
            'director_position' => env('POSITION'),
            'acceptance_date'   => Carbon::now()->addWeeks(3),
            'session'           => $application->program->getCurrentAdmissionSession($application->program)
        ];
        try {
            Mail::to($application->user->email)->send(new AdmissionAcceptanceMail($emailData));

        }catch (\Exception $e){
          throw new \Exception($e->getMessage());
        }

        return true;
    }

    private function sendRejectionEmails($application){
        $session = $application->program->getCurrentAdmissionSession($application->program);
        $emailData = [
            'name'          => $application->user->name,
            'email'         => $application->user->email,
            'program'       => $application->program->name,
            'school'        => $application->program->school->name,
            'school_email'  => $application->program->school->email,
            'school_telephone' => $application->program->school->telephone,
            'website'          => env('APP_URL'),
            'director_name'    => env('DIRECTOR_BDA_NAME'),
            'director_position' => env('POSITION'),
            'session'           => $session,
            'start_date'        => $session->start_date ?? ''
        ];
        try {
            Mail::to($application->user->email)->send(new AdmissionRejectionMail($emailData));

        }catch (\Exception $e){
            throw new \Exception($e->getMessage());
        }
    }

    private function sendAdmissionEmails($applicant, $program){
        $emailData = [
            'name'          => $applicant->name,
            'email'         => $applicant->email,
            'program_title' => $program->name,
            'date'          => Carbon::now()->addMonths(1),
            'school'        => $program->school->name,
            'school_email'  => $program->school->email,
            'school_telephone' => $program->school->telephone,
            'website'          => env('APP_URL'),
            'director_name'    => env('DIRECTOR_BDA_NAME'),
            'director_position' => env('POSITION'),
        ];
        try {
            Mail::to($applicant->email)->send(new AdmissionMail($emailData));

        }catch (\Exception $e){
            return new \Exception($e->getMessage());
        }

        return true;
    }

    private function sendAdmissionDecisionEmails($application){
        $emailData = [
            'program_image'            => '',
            'name'                     => $application->user->name,
            'email'                    => $application->user->email,
            'program_title'            => $application->program->name,
            'application_status'       => $application->application_status
        ];
        try {
            Mail::to($applicant->email)->send(new AdmissionAcceptanceMail($emailData));
        }catch (\Exception $e){
            return  response()->json(['message' => 'Could not sent email notification mail to student', 'code' => 'FAILED']);
        }

        return true;
    }


    public function uploadAdmissionDocument($request, $admission)
    {
     
         
        if(isset($request['id_card'])){
           
            $this->uploadFile($request, $admission, FileUploadCategory::ID_CARD, 'id_card');
        }

        if(isset($request['gce_cert'])){
            
            $this->uploadFile($request, $admission, FileUploadCategory::GCE_CERT, 'gce_cert');
        }

        if(isset($request["hnd_cert"])){
            
            $this->uploadFile($request, $admission, FileUploadCategory::HND_CERT, 'hnd_cert');
        }
    }

    public function downloadAdmissionDocument($request)
    {
        $this->getFile($request);
    }


    public function uploadFile($request, $admission, $type, $file_input_name)
    {

        $directory        = FileUploadCategory::ADMISSION. "/". $admission->slug . "/". $admission->program->slug. "/". $type;

        $file            = $request->file($file_input_name);

        $extension        = $file->getClientOriginalExtension();

        $fileName         =   time() . '_' . uniqid() . '.' . $extension;

         try {
            $request->file($file_input_name)->storeAs(FileStorageConstants::FILE_STORAGE_BASE_DIRECTORY.$directory, $fileName, 'public');

            $filePath = FileStorageConstants::FETCH_FILE_BASE_DIRECTORY.$directory . "/" . $fileName;

            $this->saveFile($filePath, $admission, $type);

        }catch (\Exception $exception){
            throw new BusinessValidationException($exception->getMessage(), 400);
        }
    }

    public function deleteFile($request)
    {
        $admission = Admission::where('slug', $request['slug'])->firstOrFail();

        $document = AdmissionDocument::where('doc_slug', $request['slug'])->firstOrFail();

        $directory      = FileUploadCategory::ADMISSION. "/". $admission->slug . "/". $admission->program->slug. "/". $request['type'];

        $uploadedFilePath = FileStorageConstants::FILE_STORAGE_BASE_DIRECTORY.$directory."/".$document->file_path;

        $path = public_path($uploadedFilePath);

        Storage::disk('public')->delete($path);

        $document->delete();

        return Redirect::back()->with(['status' => 'Image remove successfully']);
    }

    public function getFile($request)
    {
        $admission         = Admission::where('slug', $request['slug'])->firstOrFail();

        $document = AdmissionDocument::where('doc_slug', $request['slug'])->firstOrFail();

        $directory         = FileUploadCategory::ADMISSION. "/". $admission->slug . "/". $admission->program->slug ."/". $request['type'];

        $uploadedFilePath = FileStorageConstants::FETCH_FILE_BASE_DIRECTORY.$directory."/".$document->file_path;

        $headers = array('Content-Type: application/pdf');

        return Response::download($uploadedFilePath, $document->file_path, $headers);
    }

    private function saveFile($path, $admission, $type)
    {
        AdmissionDocument::create([
            'admission_id' => $admission->id,
            'file_path'    => $path,
            'category'     => $type
        ]);
    }
    

}
