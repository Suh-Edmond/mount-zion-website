<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAdmissionYearRequest;
use App\Models\AdmissionYear;
use App\Models\School;
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
            'admissionYears' => $years,
        ];

        return view('pages.management.admission.year.index')->with($data);
    }


    public function createAdmissionYear(Request $request)
    {
        $schools = School::all();
        $data = [
            'schools'        => $schools
        ];

        return view('pages.management.admission.year.create')->with($data);
    }

    public function storeAdmissionYear(CreateAdmissionYearRequest $request)
    {
        $this->admissionYearService->createAdmissionYear($request);

        return redirect()->route('manage.admission.years')->with(['status' => 'Admission session created successfully']);
    }

    public function editAdmissionYear(Request $request)
    {
        $currentSession = AdmissionYear::where('slug', $request['slug'])->firstOrFail();
        $schools = School::all();
        $data = [
            'currentSession' => $currentSession,
            'schools'        => $schools
        ];

        return view('pages.management.admission.year.edit-admission-year')->with($data);
    }

    public function updateAdmissionYear(CreateAdmissionYearRequest $request)
    {
        $this->admissionYearService->updateAdmissionYear($request);

        return redirect()->route('manage.admission.years')->with(['status' => 'Admission session updated successfully']);
    }

    public function removeAdmissionYear(Request $request)
    {
        $this->admissionYearService->removeAdmissionYear($request);

        return redirect()->back()->with(['status' => 'Admission session deleted successfully']);
    }

}
