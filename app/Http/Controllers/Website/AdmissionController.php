<?php /** @noinspection ALL */

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdmissionApplicantionRequest;
use App\Services\AdmissionApplicantService;
use App\Services\AdmissionYearService;
use App\Services\ProgramService;
use App\Traits\HelperTrait;
use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    use HelperTrait;
    private AdmissionYearService $admissionYearService;
    private AdmissionApplicantService $admissionApplicantService;
    private ProgramService $programService;

    public function __construct(AdmissionYearService $admissionYearService,
                                AdmissionApplicantService $admissionApplicantService,
                                ProgramService  $programService)
    {
        $this->admissionYearService = $admissionYearService;
        $this->admissionApplicantService = $admissionApplicantService;
        $this->programService = $programService;
    }
    public function index(Request $request)
    {
        $genders = $this->getGenders();
        $regions = $this->getRegions();
        $programs = $this->programService->loadPrograms();
        $admissionSession = $this->admissionYearService->getCurrentAdmissionSession();

        $data = [
            'genders' => $genders,
            'regions' => $regions,
            'programs' => $programs,
            'admissionSession' => $admissionSession
        ];

        return view('pages.guest.main-website.admission.index')->with($data);
    }

    public function getApplications(Request $request)
    {
        $years = $this->admissionYearService->listYears();
        $applicants = $this->admissionApplicantService->getApplicants($request);

        $data = [
            'years' => $years,
            'applicants' => $applicants
        ];

        return view('pages.management.admission.applicants.index')->with($data);
    }

    public function viewApplication(Request $request)
    {
        //TODO:
    }

    public function addApplicant(AdmissionApplicantionRequest  $request)
    {

        $this->admissionApplicantService->createApplicant($request);

        return response()->json(['status' => 'Applicant submitted successfully']);
    }
}
