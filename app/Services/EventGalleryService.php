<?php

namespace App\Services;

use App\Interface\EventGalleryInterface;
use App\Models\Event;
use App\Models\EventGallery;

class EventGalleryService implements EventGalleryInterface
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

    private function checkEventGalleryMainImage($event)
    {
        return $event->eventGallery()->where('is_main', true)->first();   
    }
}
