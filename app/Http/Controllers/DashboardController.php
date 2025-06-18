<?php

namespace App\Http\Controllers;

use App\Models\AdmissionYear;
use App\Models\School;
use App\Models\Program;
use App\Models\Event;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        $schools = School::all();
        $programs = Program::all()->count();
        $events   = Event::all()->count();
        $admissionSessionCount = AdmissionYear::where('status', true)->count();

        $data = [
            'schoolCount'  => $schools->count(),
            'programCount'  => $programs,
            'eventCount'    => $events,
            'admissionSessionCount' => $admissionSessionCount
        ];
        return view('dashboard')->with($data);
    }
}
