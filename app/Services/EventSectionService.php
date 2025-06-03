<?php

namespace App\Services;

use App\Interface\EventSectionInterface;
use App\Models\Event;
use App\Models\EventSection;

class EventSectionService implements EventSectionInterface {
    public function createSection($request)
    {
        $event = Event::where('slug', $request['slug'])->firstOrFail();

        EventSection::create([
            'event_id'     => $event->id,
            'title'        => $request['title'],
            'body'         => $request['body']
        ]);
    }

    public function listEventSections($request)
    {
        $event = Event::where('slug', $request['slug'])->firstOrFail();
        return $event->eventSections()->orderBy('created_at', 'DESC')->get();
    }

    public function showEventSection($request)
    {
        return EventSection::where('slug', $request['slug'])->firstOrFail();
    }

    public function deleteEventSection($request)
    {
        $section = $this->showEventSection($request);

        return $section->delete();
    }
}