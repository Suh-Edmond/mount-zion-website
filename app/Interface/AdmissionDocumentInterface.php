<?php
namespace App\Interface;

interface AdmissionDocumentInterface {
    public function uploadAdmissionDocument($request, $admission);

    public function downloadAdmissionDocument($request);
}