<?php /** @noinspection ALL */

namespace App\Services;

use App\Constant\UserType;
use App\Interface\AdmissionApplicantInterface;
use App\Mail\AdmissionMail;
use App\Models\Admission;
use App\Models\AdmissionYear;
use App\Models\Program;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdmissionApplicantService implements AdmissionApplicantInterface
{
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

        $admissionYear = AdmissionYear::findOrFail($request['admission_year_id']);
        $program = Program::findOrFail($request['program_id']);
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
            Admission::create([
                'user_id'           => $applicant['id'],
                'admission_year_id' => $admissionYear['id'],
                'program_id'        => $program['id']
            ]);

            $this->sendAdmissionEmails($applicant, $program);
        }
    }

    public function validateApplication($request)
    {
        $application = Admission::where('slug', $request['slug'])->firstOrFail();
        $application->update([
            'applicant_status' => $request['applicant_status']
        ]);
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
}
