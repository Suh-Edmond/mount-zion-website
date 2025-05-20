<?php

namespace App\Interface;

interface AdmissionYearInterface
{
    public function getAdmissionYears($request);

    public function createAdmissionYear($request);

    public function removeAdmissionYear($request);

    public function listYears();

    public function getCurrentAdmissionSession();

    public function updateAdmissionYear($request);
}
