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

        $events = $events->map(function ($event) {
            // First check for a main gallery item
            $mainGalleryItem = $event->eventGallery->firstWhere('is_main', true);
            
            // If there's a main gallery item, use it, otherwise use the first one
            $event->poster_url = $mainGalleryItem 
            ? $mainGalleryItem->file_path 
            : ($event->eventGallery->first() ? $event->eventGallery->first()->file_path : null);
            
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

         // First check for a main gallery item
         $mainGalleryItem = $event->eventGallery->firstWhere('is_main', true);
            
         // If there's a main gallery item, use it, otherwise use the first one
         $event->poster_url = $mainGalleryItem 
         ? $mainGalleryItem->file_path 
         : ($event->eventGallery->first() ? $event->eventGallery->first()->file_path : null);

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

    public function createEvent(Request $request)
    {
        $data = [
            'title' => 'Create Event',
            'caption'   => 'Provide the information below to create an event'
        ];

        return view('pages.management.events.create')->with($data);
    }

    public function storeEvent(CreateOrUpdateEventRequest $request)
    {
        $this->eventManagementService->createEvent($request);

        return redirect()->route('manage.events')->with(['status' => 'Event Created Successfully']);
    }

    public function updateEvent(CreateOrUpdateEventRequest $request)
    {
        $this->eventManagementService->updateEvent($request);

        return redirect()->back()->with(['status' => 'Event Information Updated Successfully']);
    }
}
