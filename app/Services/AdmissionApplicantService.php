<?php /** @noinspection ALL */

namespace App\Services;

use App\Constant\FileStorageConstants;
use App\Constant\FileUploadCategory;
use App\Constant\UserType;
use App\Exceptions\BusinessValidationException;
use App\Interface\AdmissionApplicantInterface;
use App\Mail\AdmissionMail;
use App\Mail\AdmissionAcceptanceMail;
use App\Models\Admission;
use App\Models\AdmissionDocument;
use App\Models\AdmissionYear;
use App\Models\Program;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
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
        
        if($admissionYear->status == false){
            return response()->json(['message' => "Admission deadline has expired! Please wait for the nest admission session"]);
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

        $this->sendAdmissionDecisionEmails($application);
    }

    private function sendAdmissionEmails($applicant, $program){
        $emailData = [
            'program_image' => '',
            'name'          => $applicant->name,
            'email'         => $applicant->email,
            'program_title' => $program->name,
        ];
        try {
            Mail::to($applicant->email)->send(new AdmissionMail($emailData));

        }catch (\Exception $e){
            return  response()->json(['message' => 'Could not sent email notification mail to student', 'code' => 'FAILED']);
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
    
    private function validate($request)
    {
        $request->validate([
            'last_name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'telephone' => ['required', 'string'],
            'region'   =>  ['required', 'string'],
            'address' => ['required', 'string'],
            'admission_year_id' => ['required', Rule::exists('admission_years', 'id')],
            'program_id' => ['required', Rule::exists('programs', 'id')],
            'school_id' => ['required', Rule::exists('schools', 'id')],
            'has_agreed' => 'required',
            'id_card' => 'required|image|mimes:jpg,jpeg,png,pdf|max:2048',
            'hnd_cert' => 'required|image|mimes:jpg,jpeg,png,pdf|max:2048',
            'gce_cert' => 'required|image|mimes:jpg,jpeg,png,pdf|max:2048'
        ]);
    }
}
