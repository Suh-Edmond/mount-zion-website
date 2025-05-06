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
        $created = $this->facultyService->storeFaculty($facultyRequest);

        return view('pages.management.faculty.index')->with(['status' => 'Faculty created successfully']);
    }

    public function updateFaculty(CreateFacultyRequest $request, $id)
    {
        $updated = $this->facultyService->updateFaculty($request, $id);

        return view('pages.management.faculty.index')->with(['status' => 'Faculty updated successfully']);
    }


    public function showFaculty(Request $request)
    {
        $data = $this->facultyService->getFaculty($request);

        return view('pages.management.faculty.show')->with($data);
    }


    public function deleteFaculty(Request $request)
    {
        $this->facultyService->deleteFaculty($request);

        return view('pages.management.faculty.index')->with(['status' => 'Faculty deleted successfully']);
    }
}
