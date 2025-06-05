<?php

namespace App\Interface;

interface EventGalleryInterface {
    public function fetchGallery($request);
    
    public function addToGallery($request);

    public function updateFromGallery($request);

    public function deleteFromGallery($request);
}