<?php

namespace App\Interface;

interface SchoolInterface
{
    public function index($request);
    public function show($slug);
    public function getSchools($request);

    public function createSchool($request);

    public function updateSchool($request);

    public function getSchool($request);

    public function deleteSchool($request);
}
