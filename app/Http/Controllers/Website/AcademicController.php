<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SchoolService;
use App\Services\ProgramService;

class AcademicController extends Controller
{
    protected $schoolService;
    protected $programService;

    public function __construct(SchoolService $schoolService, ProgramService $programService)
    {
        $this->schoolService = $schoolService;
        $this->programService = $programService;
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
        $programs = $this->programService->index($school ->id);
        $programTypes = $this->programService->getProgramTypes($school ->id);
        return view('pages.guest.main-website.schools.school-details', [
            'school' => $school,
            'programs' => $programs,
            'programTypes' => $programTypes,
        ]);
    }

    public function program(Request $request, $schoolSlug, $programSlug)
    {
        $school = $this->schoolService->show($schoolSlug);
        $program = $this->programService->show($programSlug);
        return view('pages.guest.main-website.schools.program-single', [
            'school' => $school,
            'program' => $program,
        ]);
    }
}
