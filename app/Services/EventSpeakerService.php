<?php

namespace App\Services;

use App\Interface\EventSpeakerInterface;
use App\Models\Event;
use App\Models\Speaker;

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
        Speaker::create([
            'name'                 =>  $request['name'],
            'title'                => $request['title'],
            'picture'              => '',
            'event_id'              => $event->id,
            'social_media_handles'  => $this->createSocialMediahandle($request)
        ]);
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
        
        return $speaker->delete();
    }

    public function uploadFile($request)
    {
        $speaker         = Speaker::where('slug', $request['slug'])->firstOrFail();

        $directory      = FileUploadCategory::SPEAKER. "/". $speaker->slug;

        $extension      = $file->getClientOriginalExtension();

        $fileName       =   time() . '_' . uniqid() . '.' . $extension;

         try {
            $request->validate([
                'image' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);

             $request->file('image')->storeAs(FileStorageConstants::FILE_STORAGE_BASE_DIRECTORY.$directory, $fileName, 'public');

             $filePath = FileStorageConstants::FETCH_FILE_BASE_DIRECTORY.$directory."/".$fileName;

             $this->saveFile($filePath, $speaker);

        }catch (\Exception $exception){
            throw new BusinessValidationException($exception->getMessage(), 400);
        }
    }

    private function saveFile($path, $speaker)
    {
        $speaker->update([
            'picture'  => $path
        ]);
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


}
