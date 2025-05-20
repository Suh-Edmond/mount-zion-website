<?php

namespace App\Interface;

interface ProgramInterface
{
    public function index($request);

    public function listPrograms($request);

    public function createProgram($request);

    public function deleteProgram($request);

    public function updateProgram($request);

    public function showProgram($request);

    public function getPrograms($school_id, $program_type);

    public function loadPrograms();
}
