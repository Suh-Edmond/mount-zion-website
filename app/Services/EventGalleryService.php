<?php

namespace App\Services;

use App\Interface\EventGalleryInterface;
use App\Models\Event;
use App\Models\EventGallery;

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
        EventGallery::create([
            'event_id'   => $evt->id,
            'file_path'  => '',
            'is_main'    => $request['is_main']
        ]);
    }

    public function updateFromGallery($request)
    {
        $evtGallery = EventGallery::where('slug', $request['slug'])->firstOrFail();
        $evtGallery->update([
            'file_path' => '',
            'is_main'   => $request['is_main']
        ]);
    }

    public function deleteFromGallery($request)
    {
        $evtGallery = EventGallery::where('slug', $request['slug'])->firstOrFail();
        return $evtGallery->delete();
    }

    public function uploadFile($request)
    {
        $gallery         = EventGallery::where('slug', $request['slug'])->firstOrFail();

        $directory      = FileUploadCategory::GALLERY. "/". $gallery->slug;

        $extension      = $file->getClientOriginalExtension();

        $fileName       =   time() . '_' . uniqid() . '.' . $extension;

         try {
            $request->validate([
                'image' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);

             $request->file('image')->storeAs(FileStorageConstants::FILE_STORAGE_BASE_DIRECTORY.$directory, $fileName, 'public');

             $filePath = FileStorageConstants::FETCH_FILE_BASE_DIRECTORY.$directory."/".$fileName;

             $this->saveFile($filePath, $gallery, $request['is_main']);

        }catch (\Exception $exception){
            throw new BusinessValidationException($exception->getMessage(), 400);
        }
    }

    public function deleteFile($request)
    {
        $gallery = EventGallery::where('slug', $request['slug'])->firstOrFail();

        $directory      = FileUploadCategory::SPEAKER. "/". $gallery->event->slug . "/". $gallery->slug;

        $uploadedFilePath = FileStorageConstants::FILE_STORAGE_BASE_DIRECTORY.$directory."/".$fileName;

        $path = public_path($uploadedFilePath);

        Storage::disk('public')->delete($path);

        $image->delete();

        return Redirect::back()->with(['status' => 'Image remove successfully']);
    }

    public function getFile($request)
    {
        $gallery         = EventGallery::where('slug', $request['slug'])->firstOrFail();

        $directory      =  FileUploadCategory::SPEAKER. "/". $gallery->event->slug . "/". $gallery->slug;

        $uploadedFilePath = FileStorageConstants::FETCH_FILE_BASE_DIRECTORY.$directory."/".$fileName;

        $headers = array('Content-Type: application/pdf');

        return Response::download($uploadedFilePath, $fileName, $headers);
    }

    private function saveFile($path, $gallery, $is_main)
    {
        $speaker->update([
            'file_path'  => $path,
            'is_main'    => $is_main
        ]);
    }

    private function checkEventGalleryMainImage($event)
    {
        return $event->eventGallery()->where('is_main', true)->first();   
    }
}
