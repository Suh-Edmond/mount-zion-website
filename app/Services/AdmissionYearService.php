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
        $exist = AdmissionYear::where('status', true)->first();
        if(isset($exist)){
            $exist->update([
                'status' => false
            ]);
        }
        return AdmissionYear::create([
            'year' => $request['year'],
            'name'  => $request['name'],
            'status'   => true,
            'start_date' => $request['start_date'],
            'end_date'   => $request['end_date']
        ]);
    }

    public function listYears()
    {
        return AdmissionYear::orderBy('year', 'desc')->get();
    }

    public function getCurrentAdmissionSession()
    {
        return AdmissionYear::where('status', true)->firstOrFail();
    }
}
