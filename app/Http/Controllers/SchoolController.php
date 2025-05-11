<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSchoolRequest;
use App\Services\SchoolService;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    private SchoolService $schoolService;

    public function __construct(SchoolService $schoolService)
    {
        $this->schoolService = $schoolService;
    }


    public function index(Request $request)
    {
        $data = [
            'schools' => $this->schoolService->getSchools($request)
        ];
        return view('pages.management.school.index')->with($data);
    }


    public function createSchool(Request $request)
    {
        $regions = array('Northwest', 'Southwest', 'Douala', 'Yaounde', 'Far North', 'East');
        $data = [
            'title' => 'Create School',
            'regions'  => $regions
        ];
        return view('pages.management.school.create')->with($data);
    }

    public function storeSchool(CreateSchoolRequest $request)
    {
        $this->schoolService->createSchool($request);
        $data = [
            'schools' => $this->schoolService->getSchools($request)
        ];
        return view('pages.management.school.index')->with($data);
    }

    public function showSchool(Request $request)
    {
        $school = $this->schoolService->getSchool($request);
        $data = [
            'school' => $school,
            'programs' => $school->programs()->orderBy('name', 'desc')->paginate(5)
        ];

        return view('pages.management.school.show')->with($data);
    }

    public function deleteSchool(Request $request)
    {
        $this->schoolService->deleteSchool($request);

        $data = [
            'schools' => $this->schoolService->index($request)
        ];
        return redirect()->route('manage.academics')->with(['status' => 'School deleted successfully', 'data' => $data]);
    }

    public function updateSchool(CreateSchoolRequest $request)
    {
        $this->schoolService->updateSchool($request);

        return redirect()->back()->with(['status' => 'School updated successfully']);
    }
}
