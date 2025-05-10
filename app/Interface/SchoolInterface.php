<?php

namespace App\Interface;

interface SchoolInterface
{
    public function index($request);
    public function show($slug);
}
