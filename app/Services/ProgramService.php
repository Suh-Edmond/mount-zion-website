<?php

namespace App\Services;

use App\Interface\ProgramInterface;
use App\Models\Program;

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
}
