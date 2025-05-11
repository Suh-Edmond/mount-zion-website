<?php

namespace App\Services;

use App\Interface\SchoolInterface;
use App\Models\Faculty;
use App\Models\School;

class SchoolService implements SchoolInterface
{

    public function index($request)
    {
        return School::orderBy('name', 'DESC');
    }

    public function show($slug)
    {
        return School::where('slug', $slug)->firstOrFail();
    }

    public function getSchools($request)
    {
        return $this->index($request)->get();
    }

    public function createSchool($request)
    {
        return School::create([
            'name'        => $request['name'],
            'email'       => $request['email'],
            'telephone'   => $request['telephone'],
            'image_path'   => '',
            'region'       => $request['region'],
            'address'       => $request['address']
        ]);
    }

    public function updateSchool($request)
    {
        $school = School::where('slug', $request['slug'])->firstOrFail();
        return $school->update($request->all());
    }

    public function getSchool($request)
    {
        return School::where('slug', $request['slug'])->firstOrFail();
    }

    public function deleteSchool($request)
    {

        $deleted = School::where('slug',$request['slug'])->firstOrFail();

        $deleted->delete();
    }
}
