<?php

namespace App\Services;

use App\Constant\FileStorageConstants;
use App\Constant\FileUploadCategory;
use App\Interface\EventGalleryInterface;
use App\Interface\FileUploadInterface;
use App\Models\Event;
use App\Models\EventGallery;
use Exception;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class EventGalleryService implements EventGalleryInterface, FileUploadInterface
{
    public function fetchGallery($request)
    {
        $event = Event::where('slug', $request['slug'])->firstOrFail();

        $gallery = $event->eventGallery()->orderBy('created_at', 'desc')->get();

        $hasMainImage = $this->checkEventGalleryMainImage($event);

        return [$event, $gallery, $hasMainImage];
    }

    public function addToGallery($request)
    {
         
        $evt = Event::where('slug', $request['slug'])->firstOrFail();
        
        $hasMainImage = $this->checkEventGalleryMainImage($evt);

        $gallery = EventGallery::create([
            'event_id'   => $evt->id,
            'file_path'  => '',
            'is_main'    => isset($hasMainImage) ? false : true,
            'video_url' => $request['video_url'],
        ]);

        $this->upload($gallery, $request);
    }

    public function updateFromGallery($request)
    {
        $evtGallery = EventGallery::where('slug', $request['slug'])->firstOrFail();
        $evtGallery->update([
            'video_url' => $request['video_url']
        ]);
        $this->uploadFile($request, $evtGallery->slug);
    }

    public function deleteFromGallery($request)
    {
        $evtGallery = EventGallery::where('slug', $request['slug'])->firstOrFail();
        return $evtGallery->delete();
    }

    public function uploadFile($request, $slug=null)
    {
        $gallery = EventGallery::where('slug', $request['slug'])->firstOrFail();

        $this->upload($gallery, $request);
    }

    public function deleteFile($request)
    {
        $gallery = EventGallery::where('slug', $request['slug'])->firstOrFail();

        $directory      = FileUploadCategory::GALLERY. "/" . $gallery->event->slug . "/". $gallery->slug;

        $uploadedFilePath = FileStorageConstants::FILE_STORAGE_BASE_DIRECTORY.$directory. "/" .$gallery->file_path;

        $path = public_path($uploadedFilePath);

        Storage::disk('public')->delete($path);

        $gallery->delete();

        return Redirect::back()->with(['status' => 'Image remove successfully']);
    }

    public function getFile($request)
    {
        $gallery         = EventGallery::where('slug', $request['slug'])->firstOrFail();

        $directory       =  FileUploadCategory::GALLERY. "/". $gallery->event->slug . "/". $gallery->slug;

        $uploadedFilePath = FileStorageConstants::FETCH_FILE_BASE_DIRECTORY.$directory. "/". $gallery->file_path;

        $headers = array('Content-Type: application/pdf');

        return Response::download($uploadedFilePath, $gallery->file_path, $headers);
    }

    private function saveFile($path, $gallery, $is_main)
    {

        $gallery->update([
            'file_path'  => $path,
        ]);
    }

    private function checkEventGalleryMainImage($event)
    {
        return $event->eventGallery()->where('is_main', true)->first();   
    }

    private function upload($gallery, $request)
    {
        $directory      = FileUploadCategory::GALLERY. "/". $gallery->event->slug . "/". $gallery->slug;

        $file            = $request->file('image');

        $extension       = $file->getClientOriginalExtension();

        $fileName        = time() . '_' . uniqid() . '.' . $extension;

        try {
            $request->validate([
                'image' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);

             $request->file('image')->storeAs(FileStorageConstants::FILE_STORAGE_BASE_DIRECTORY."/".$directory, $fileName, 'public');

             $filePath = FileStorageConstants::FETCH_FILE_BASE_DIRECTORY.$directory."/".$fileName;

             $this->saveFile($filePath, $gallery, $request['is_main']);

        }catch (\Exception $exception){
            throw new Exception($exception->getMessage(), 400);
        }
    }
}
