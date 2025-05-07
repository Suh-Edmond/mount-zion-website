<?php

namespace App\Interface;

interface FacultyInterface
{
    public function index($request);

    public function createFaculty($request);

    public function storeFaculty($facultyRequest);

    public function updateFaculty($request);

    public function getFaculty($request);

    public function deleteFaculty($request);
}
