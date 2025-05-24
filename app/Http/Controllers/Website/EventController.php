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
        return view('pages.guest.main-website.event.index');
    }

    public function detail(Request $request)
    {
        return view('pages.guest.main-website.event.detail');
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
