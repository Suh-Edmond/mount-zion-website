<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Faculty;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(Request $request)
    {
        $faculty = Faculty::where('slug', $request['slug'])->firstOrFail();
        $depts = $faculty->departments()->orderBy('name', 'DESC')->paginate(10);
        $data = [
            'faculty' => $faculty,
            'departments' => $depts
        ];

        return view('pages.management.department.index')->with($data);
    }

    public function show(Request $request)
    {
        $dept = Department::where('slug', $request['slug'])->firstOrFail();

        $data = [
            'department' => $dept
        ];

        return view('pages.management.department.show')->with($data);
    }
}
