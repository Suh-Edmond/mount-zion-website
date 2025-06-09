<?php

namespace App\Interface;

interface FileUploadInterface {
    public function uploadFile($request);

    public function deleteFile($request);

    public function getFile($request);
}