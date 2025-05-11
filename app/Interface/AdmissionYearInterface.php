<?php

namespace App\Interface;

interface AdmissionYearInterface
{
    public function getAdmissionYears($request);

    public function createAdmissionYear($request);

    public function removeAdmissionYear($request);
}
