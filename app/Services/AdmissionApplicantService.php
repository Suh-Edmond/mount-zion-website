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
        return Admission::paginate(10);
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
        if(!isset($applicant)){
            $applicant = User::create([
                'name'              => $request['fname'].' '.$request['lname'],
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
