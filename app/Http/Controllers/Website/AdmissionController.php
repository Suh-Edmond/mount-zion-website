<?php /** @noinspection ALL */

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdmissionApplicantionRequest;
use App\Services\AdmissionApplicantService;
use App\Services\AdmissionYearService;
use App\Services\ProgramService;
use App\Services\SchoolService;
use App\Traits\HelperTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdmissionController extends Controller
{
    use HelperTrait;
    private AdmissionYearService $admissionYearService;
    private AdmissionApplicantService $admissionApplicantService;
    private ProgramService $programService;
    private SchoolService $schoolService;

    public function __construct(AdmissionYearService $admissionYearService,
                                AdmissionApplicantService $admissionApplicantService,
                                ProgramService  $programService, SchoolService $schoolService)
    {
        $this->admissionYearService = $admissionYearService;
        $this->admissionApplicantService = $admissionApplicantService;
        $this->programService = $programService;
        $this->schoolService = $schoolService;
    }
    public function index(Request $request)
    {
        $genders = $this->getGenders();
        $regions = $this->getRegions();
        $schools = $this->schoolService->index($request)->get();
        $admissionSession = $this->admissionYearService->getCurrentAdmissionSession();

        $data = [
            'genders' => $genders,
            'regions' => $regions,
            'schools' => $schools,
            'admissionSession' => $admissionSession,
            'application_deadline_expired' => $this->checkIfApplicationDeadlineHadExpire($admissionSession->end_date),
        ];

        return view('pages.guest.main-website.admission.index')->with($data);
    }

    public function getApplications(Request $request)
    {
        $years = $this->admissionYearService->listYears();
        $applicants = $this->admissionApplicantService->getApplicants($request);
        $schools = $this->schoolService->getSchools($request);
        $admissionSessions = $this->admissionYearService->getAdmissionSessionByYear($request);

        $data = [
            'years' => $years,
            'applicants' => $applicants,
            'schools'    => $schools,
            'admissionSessions' => $admissionSessions
        ];

        return view('pages.management.admission.applicants.index')->with($data);
    }

    public function viewApplication(Request $request)
    {
        $data = $this->admissionApplicantService->showApplicant($request);
        $applicationStatuses = $this->getApplicationStatus();

        $data = [
            'applicant' => $data,
            'applicationStatuses' => $applicationStatuses
        ];

        return view('pages.management.admission.applicants.show')->with($data);
    }

    public function addApplicant(AdmissionApplicantionRequest  $request)
    {

        $this->admissionApplicantService->createApplicant($request);

        return response()->json(['status' => 'Applicant submitted successfully']);
    }

    public function deleteApplication(Request $request)
    {
        $this->admissionApplicantService->deleteApplicant($request);

        return redirect()->back()->with(['status' => 'Applicant removed successfully']);
    }

    public function validateApplication(Request $request)
    {
        $this->admissionApplicantService->validateApplication($request);

        return redirect()->back()->with(['status' => 'Application validated successfully']);

    }

    public function createApplication(Request $request)
    {
        $genders = $this->getGenders();
        $regions = $this->getRegions();
        $programs = $this->programService->loadPrograms();
        $admissionSession = $this->admissionYearService->getCurrentAdmissionSession();
        $schools = $this->schoolService->index($request)->get();

        $data = [
            'genders' => $genders,
            'regions' => $regions,
            'programs' => $programs,
            'admissionSession' => $admissionSession,
            'schools'          => $schools
        ];

        return view('pages.management.admission.applicants.add-applicant')->with($data);
    }

    public function saveApplication(AdmissionApplicantionRequest $applicantionRequest)
    {
        $this->admissionApplicantService->createApplicant($applicantionRequest);

        return Redirect::route('manage.admission.applicants')->with(['status' => 'Applicant created successfully']);
    }
}
