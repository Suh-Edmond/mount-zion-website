<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAdmissionYearRequest;
use App\Services\AdmissionYearService;
use Illuminate\Http\Request;

class AdmissionYearController extends Controller
{
    private AdmissionYearService $admissionYearService;

    public function __construct(AdmissionYearService $admissionYearService)
    {
        $this->admissionYearService = $admissionYearService;
    }

    public function index(Request $request)
    {
        $years = $this->admissionYearService->getAdmissionYears($request);
        $data = [
            'admissionYears' => $years
        ];

        return view('pages.management.admission.year.index')->with($data);
    }


    public function createAdmissionYear(CreateAdmissionYearRequest $request)
    {
        $this->admissionYearService->createAdmissionYear($request);

        return redirect()->back()->with(['status' => 'Admission year created successfully']);
    }

    public function removeAdmissionYear(Request $request)
    {
        $this->admissionYearService->removeAdmissionYear($request);

        return redirect()->back()->with(['status' => 'Admission year deleted successfully']);
    }

}
