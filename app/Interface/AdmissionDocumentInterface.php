<?php
namespace App\Interface;

interface AdmissionDocumentInterface {
    public function uploadAdmissionDocument($request);

    public function downloadAdmissionDocument($request);
}