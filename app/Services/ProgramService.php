<?php

namespace App\Services;

use App\Constant\ProgramType;
use App\Interface\ProgramInterface;
use App\Models\Program;
use App\Models\School;
use Illuminate\Validation\Rule;

class ProgramService implements ProgramInterface
{

    public function index($schoolId)
    {
        return Program::where('school_id', $schoolId)->orderBy('name', 'ASC')->get();
    }

    public function show($slug)
    {
        return Program::where('slug', $slug)->firstOrFail();
    }

    public function getProgramTypes($schoolId)
    {
        return Program::where('school_id', $schoolId)->distinct()->pluck('tag');
    }

    public function listPrograms($request)
    {
        $slug = $request['slug'];
        return School::where('slug', $slug)->firstOrFail();
    }


    public function createProgram($request)
    {
        $slug = $request['slug'];
        return School::where('slug', $slug)->firstOrFail();
    }


    public function storeProgram($request)
    {
        $data = $this->validateRequest($request);
        $school  = School::where('slug', $data['school_slug'])->firstOrFail();
        Program::create([
            'name'      => $data['name'],
            'about'     => $data['about'],
            'tag'       => $data['tag'],
            'duration'  => $data['duration'],
            'image_path' => '',
            'school_id'  => $school->id
        ]);
    }

    public function showProgram($request)
    {
        $slug = $request['slug'];
        return Program::where('slug', $slug)->firstOrFail();
    }

    public function deleteProgram($request)
    {
        $program = Program::where('slug', $request['slug'])->firstOrFail();
        $program->delete();
    }

    public function updateProgram($request)
    {
        $data = $this->validateUpdateRequest($request);
        $program = Program::where('slug', $request['slug'])->firstOrFail();

        return $program->update($data);
    }


    private function validateRequest($request)
    {
        return $request->validate([
            'name'      => 'required|string|min:5|max:255',
            'about'     => 'required|string|min:100|max:5000',
            'tag'       => ['required',  Rule::in([ProgramType::HND, ProgramType::BACHELOR, ProgramType::SPECIAL_CARE]) ],
            'duration'  => ['required', 'min:1', 'max:5'],
            'image_path' => 'required|image|mimes:jpg,jpeg,png',
            'school_slug'  => ['required', 'string']
        ]);
    }


    private function validateUpdateRequest($request)
    {
        return $request->validate([
            'name'      => 'required|string|min:5|max:255',
            'about'     => 'required|string|min:100|max:5000',
            'tag'       => ['required',  Rule::in([ProgramType::HND, ProgramType::BACHELOR, ProgramType::SPECIAL_CARE]) ],
            'duration'  => ['required', 'min:1', 'max:5'],
            'slug'      => ['required', 'string']
        ]);
    }
}
