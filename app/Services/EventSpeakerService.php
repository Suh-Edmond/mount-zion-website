<?php

namespace App\Services;

use App\Constant\FileStorageConstants;
use App\Constant\FileUploadCategory;
use App\Interface\EventSpeakerInterface;
use App\Interface\FileUploadInterface;
use App\Models\Event;
use App\Models\Speaker;
use Exception;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class EventSpeakerService  implements EventSpeakerInterface, FileUploadInterface
{

    public function listSpeakers($request)
    {
        $event = Event::where('slug', $request['slug'])->first();
        $speakers = $event->speakers()->orderBy('name', 'desc')->get();

        return [$event, $speakers];
    }

    public function createEventSpeaker($request)
    {
        $event = Event::where('slug', $request['slug'])->firstOrFail();
        $speaker = Speaker::create([
            'name'                 =>  $request['name'],
            'title'                => $request['title'],
            'picture'              => '',
            'event_id'              => $event->id,
            'social_media_handles'  => $this->createSocialMediahandle($request)
        ]);

        $this->upload($speaker, $request);
    }

    public function updateEventSpeaker($request)
    {
        $speaker = Speaker::where('slug', $request['slug'])->firstOrFail();
        $speaker->update([
            'name'                 =>  $request['name'],
            'title'                => $request['title'],
            'social_media_handles'  => $this->createSocialMediahandle($request)
        ]);
    }

    public function showSpeaker($request) {
        return Speaker::where('slug', $request['slug'])->firstOrFail();
    }

    public function deleteSpeaker($request) {
        $speaker = Speaker::where('slug', $request['slug'])->firstOrFail();
        $this->deleteFile($speaker);
        
        return $speaker->delete();
    }

    public function uploadFile($request)
    {
        $speaker  = Speaker::where('slug', $request['slug'])->firstOrFail();

        $this->upload($speaker, $request);
    }

    private function saveFile($path, $speaker)
    {
        $speaker->update([
            'picture'  => $path
        ]);
    }

    
    public function deleteFile($speaker)
    {
        $directory      = FileUploadCategory::SPEAKER. "/". $speaker->event->slug . "/". $speaker->slug;

        $uploadedFilePath = FileStorageConstants::FILE_STORAGE_BASE_DIRECTORY.$directory."/".$speaker->picture;

        $path = public_path($uploadedFilePath);

        Storage::disk('public')->delete($path);

        $speaker->delete();
    }

    public function getFile($request)
    {
        $speaker         = Speaker::where('slug', $request['slug'])->firstOrFail();

        $directory      =  FileUploadCategory::SPEAKER. "/". $speaker->event->slug . "/". $speaker->slug;

        $uploadedFilePath = FileStorageConstants::FETCH_FILE_BASE_DIRECTORY.$directory."/".$speaker->picture;

        $headers = array('Content-Type: application/pdf');

        return Response::download($uploadedFilePath, $speaker->picture, $headers);
    }

    private function createSocialMediahandle($request)
    {
        $handle = "";
        if (isset($request['linkedln'])) {
            $handle = $handle . "#" . $request['linkedln'];
        }
        if (isset($request['facebook'])) {
            $handle = $handle . "#" . $request['facebook'];
        }
        if (isset($request['skype'])) {
            $handle = $handle . "#" . $request['skype'];
        }

        return $handle;
    }


    private function upload($speaker, $request)
    {
        $directory      = FileUploadCategory::SPEAKER. "/". $speaker->event->slug . "/". $speaker->slug;
        $file           =         $request->file('image');
        $extension      = $file->getClientOriginalExtension();

        $fileName       =   time() . '_' . uniqid() . '.' . $extension;

         try {
            $request->validate([
                'image' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);

             $request->file('image')->storeAs(FileStorageConstants::FILE_STORAGE_BASE_DIRECTORY."/".$directory, $fileName, 'public');

             $filePath = FileStorageConstants::FETCH_FILE_BASE_DIRECTORY.$directory."/".$fileName;

             $this->saveFile($filePath, $speaker);

        }catch (\Exception $exception){
            throw new Exception($exception->getMessage(), 400);
        }
    }
}
