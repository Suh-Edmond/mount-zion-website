<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SchoolService;

class AcademicController extends Controller
{
    protected $schoolService;

    public function __construct(SchoolService $schoolService)
    {
        $this->schoolService = $schoolService;
    }

    public function index(Request $request)
    {
        return view('pages.guest.main-website.academic.index');
    }

    public function academicArea(Request $request)
    {
        return view('pages.guest.main-website.academic.academic-area');
    }

    public function school(Request $request, $slug)
    {
        $school = $this->schoolService->show($slug);
        return view('pages.guest.main-website.schools.school-details', [
            'school' => $school
        ]);
    }
}
