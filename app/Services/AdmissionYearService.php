<?php

namespace App\Services;

use App\Interface\AdmissionYearInterface;
use App\Models\AdmissionYear;

class AdmissionYearService implements AdmissionYearInterface
{

    public function getAdmissionYears($request)
    {
        return AdmissionYear::orderBy('year', 'desc')->paginate(10);
    }

    public function removeAdmissionYear($request)
    {
        $year =AdmissionYear::where('slug', $request['slug'])->firstOrFail();
        $year->delete();
    }

    public function createAdmissionYear($request)
    {
        return AdmissionYear::create([
            'year' => $request['year'],
            'name'  => $request['name'],
            'status'   => 1
        ]);
    }

    public function listYears()
    {
        return AdmissionYear::orderBy('year', 'desc')->get();
    }
}
