<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFacultyRequest;
use App\Models\Faculty;
use App\Services\FacultyService;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    private FacultyService $facultyService;

    public function __construct(FacultyService $facultyService)
    {
        $this->facultyService = $facultyService;
    }

    public function index(Request $request)
    {
        $data = [
            'faculties' => $this->facultyService->index($request)
        ];
        return view('pages.management.faculty.index')->with($data);
    }


    public function createFaculty(Request $request)
    {
        $data = [
            'title' => 'Create Faculty',
        ];
        return view('pages.management.faculty.create')->with($data);
    }


    public function storeFaculty(CreateFacultyRequest $facultyRequest)
    {
        $this->facultyService->storeFaculty($facultyRequest);
        $data = [
            'faculties' => $this->facultyService->index($facultyRequest)
        ];
        return view('pages.management.faculty.index')->with($data);
    }

    public function updateFaculty(CreateFacultyRequest $request)
    {
        $updated = $this->facultyService->updateFaculty($request);

        return redirect()->back()->with(['status' => 'Faculty updated successfully']);
    }


    public function showFaculty(Request $request)
    {
        $faculty = $this->facultyService->getFaculty($request);
        $data = [
            'faculty' => $faculty,
            'departments' => $faculty->departments()->orderBy('name', 'desc')->paginate(5)
        ];

        return view('pages.management.faculty.show')->with($data);
    }


    public function deleteFaculty(Request $request)
    {
        $this->facultyService->deleteFaculty($request);

        $data = [
            'faculties' => $this->facultyService->index($request)
        ];
        return redirect()->route('manage.academics')->with(['status' => 'Faculty deleted successfully', 'data' => $data]);
    }
}
