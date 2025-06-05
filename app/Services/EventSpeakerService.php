<?php

namespace App\Services;

use App\Interface\EventSpeakerInterface;
use App\Models\Event;
use App\Models\Speaker;

class EventSpeakerService  implements EventSpeakerInterface
{
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

    public function showSpeaker($request) {
        return Speaker::where('slug', $request['slug'])->firstOrFail();
    }

    public function deleteSpeaker($request) {
        $speaker = Speaker::where('slug', $request['slug'])->firstOrFail();
        
        return $speaker->delete();
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
