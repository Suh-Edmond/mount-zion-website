<?php

namespace App\Services;

use App\Interface\AdmissionApplicantInterface;
use App\Models\Admission;

class AdmissionApplicantService implements AdmissionApplicantInterface
{
    public function getApplicants($request)
    {
        return Admission::paginate(10);
    }

    public function showApplicant($request)
    {
        // TODO: Implement showApplicant() method.
    }

    public function downloadApplicantFiles($request)
    {
        // TODO: Implement downloadApplicantFiles() method.
    }

    public function deleteApplicant($request)
    {
        // TODO: Implement deleteApplicant() method.
    }
}
