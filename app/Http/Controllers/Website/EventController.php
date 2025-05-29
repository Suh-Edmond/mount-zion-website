<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateOrUpdateEventRequest;
use App\Services\EventManagementService;
use Illuminate\Http\Request;

class EventController extends Controller
{
    private EventManagementService $eventManagementService;

    public function __construct(EventManagementService $eventManagementService)
    {
        $this->eventManagementService = $eventManagementService;
    }


    public function index(Request $request)
    {
        $events = $this->eventManagementService->fetchEvents($request);

        if (!$events->first()?->relationLoaded('eventGallery')) {
            $events->load('eventGallery');
        }

        if (!$events->first()?->relationLoaded('eventSections')) {
            $events->load('eventSections');
        }

        if (!$events->first()?->relationLoaded('speakers')) {
            $events->load('speakers');
        }

        // Add the first gallery image to each event
        $events = $events->map(function ($event) {
            $event->poster_url = $event->eventGallery->first() ? $event->eventGallery->first()->file_path : null;
            return $event;
        });

        return view('pages.guest.main-website.event.index', [
            'events' => $events
        ]);
    }

    public function detail(Request $request)
    {
        $event = $this->eventManagementService->showEventInformation($request);
        if(!$event->relationLoaded('eventGallery')) {
            $event->load('eventGallery');
        }

        $event->poster_url = $event->eventGallery->first() ? $event->eventGallery->first()->file_path : null;
        return view('pages.guest.main-website.event.detail', [
            'event'=> $event
        ]);
    }

    public function fetchEvents(Request $request)
    {
        $data = $this->eventManagementService->fetchEvents($request);

        $data = [
            'events' => $data
        ];

        return view('pages.management.events.index')->with($data);
    }

    public function showEventInformation(Request $request)
    {
        $data = $this->eventManagementService->showEventInformation($request);

        $data = [
            'event' => $data
        ];

        return view('pages.management.events.show')->with($data);
    }

    public function createEvent(CreateOrUpdateEventRequest $request)
    {
        $data = [
            'title' => 'Create Event',
            'caption'   => 'Provide the information below to create an event'
        ];

        return view('pages.manage.events.create')->with($data);
    }

    public function updateEvent(CreateOrUpdateEventRequest $request)
    {
        $this->eventManagementService->updateEvent($request);

        return redirect()->back()->with(['status' => 'Event Information Updated Successfully']);
    }
}
