<?php

namespace App\Http\Controllers;

use App\Constant\ProgramType;
use App\Models\Program;
use App\Models\School;
use App\Services\ProgramService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ProgramController extends Controller
{
    private  ProgramService $programService;

    public function __construct(ProgramService $programService)
    {
        $this->programService = $programService;
    }

    public function listPrograms(Request $request)
    {
        $school = $this->programService->listPrograms($request);
        $data = [
            'school' => $school,
            'programs' => $school->programs()->orderBy('name', 'desc')->paginate(6)
        ];

        return view('pages.management.program.index')->with($data);
    }

    public function show(Request $request)
    {
        $program = $this->programService->showProgram($request);
        $tags = array(ProgramType::SPECIAL_CARE, ProgramType::BACHELOR, ProgramType::HND);
        $data = [
            'program' => $program,
            'tags'  => $tags
        ];

        return view('pages.management.program.show')->with($data);
    }


    public function createProgram(Request $request)
    {
        $school = $this->programService->createProgram($request);
        $tags = array(ProgramType::SPECIAL_CARE, ProgramType::BACHELOR, ProgramType::HND);
        $data = [
            'school' => $school,
            'tags'  => $tags
        ];

        return view('pages.management.program.create')->with($data);
    }

    public function storeProgram(Request $request)
    {
        $this->programService->storeProgram($request);
        return Redirect::route('manage.academics.programs.list', ['slug' => $request['school_slug']])->with('status', 'Program save successfully');
    }

    public function deleteProgram(Request $request)
    {
        $this->programService->deleteProgram($request);

        return Redirect::route('manage.academics.programs.list', ['slug' => $request['school_slug']])->with('status', 'Program deleted successfully');
    }

    public function editUploadProgramImage(Request $request)
    {
    }

    public function editProgram(Request $request)
    {
        $this->programService->updateProgram($request);

        return Redirect::route('manage.academics.programs.show', ['slug' => $request['slug']])->with('status', 'Program information updated successfully');
    }
}
