<?php

namespace App\Services;

use App\Interface\FacultyInterface;
use App\Models\Faculty;

class FacultyService implements FacultyInterface
{

    public function index($request)
    {
        return Faculty::orderBy('name', 'DESC')->paginate(10);
    }

    public function createFaculty($request)
    {
        // TODO: Implement createFaculty() method.
    }

    public function storeFaculty($facultyRequest)
    {
        return Faculty::create([
            'name'        => $facultyRequest['name'],
            'about'       => $facultyRequest['about'],
            'email'       => $facultyRequest['email'],
            'telephone'   => $facultyRequest['telephone'],
            'image_path'   => ''
        ]);
    }

    public function updateFaculty($request)
    {
        $faculty = Faculty::where('slug', $request['slug'])->firstOrFail();
        return $faculty->update($request->all());
    }

    public function getFaculty($request)
    {
        return Faculty::where('slug', $request['slug'])->firstOrFail();
    }

    public function deleteFaculty($request)
    {
        return Faculty::where('slug',$request['slug'])->findOrFail()->delete();
    }
}
