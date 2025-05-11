<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Services\AdmissionApplicantService;
use App\Services\AdmissionYearService;
use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    private AdmissionYearService $admissionYearService;
    private AdmissionApplicantService $admissionApplicantService;

    public function __construct(AdmissionYearService $admissionYearService, AdmissionApplicantService $admissionApplicantService)
    {
        $this->admissionYearService = $admissionYearService;
        $this->admissionApplicantService = $admissionApplicantService;
    }
    public function index(Request $request)
    {
        return view('pages.guest.main-website.admission.index');
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
}
