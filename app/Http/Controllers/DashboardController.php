<?php

namespace App\Http\Controllers;
use App\Models\School;
use App\Models\Program;
use App\Models\Event;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        $schools = School::all()->count();
        $programs = Program::all()->count();
        $events   = Event::all()->count();

        $data = [
            'schoolCount'  => $schools,
            'programCount'  => $programs,
            'eventCount'    => $events
        ]
        return view('dashboard')->with($data);
    }
}
