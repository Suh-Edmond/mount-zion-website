<?php

namespace App\Interface;

interface AdmissionApplicantInterface
{
    public function getApplicants($request);

    public function showApplicant($request);

    public function downloadApplicantFiles($request);

    public function deleteApplicant($request);
}
