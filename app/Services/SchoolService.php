<?php

namespace App\Services;

use App\Interface\SchoolInterface;
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
}
