<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEventSectionRequest;
use App\Models\Event;
use App\Services\EventSectionService;
use Illuminate\Http\Request;

class EventSectionController extends Controller
{

    private EventSectionService $eventSectionService;

    public function __construct(EventSectionService $eventSectionService)
    {
        $this->eventSectionService = $eventSectionService;
    }

    public function listEventSections(Request $request)
    {
        $event = Event::where('slug', $request['slug'])->firstOrFail();
        $sections = $this->eventSectionService->listEventSections($request);
       
        $data = [
            'sections' => $sections,
            'event'     => $event
        ];

        return view('pages.management.events.sections.index')->with($data);
    }


    public function addEventSection(CreateEventSectionRequest $request)
    {
        $this->eventSectionService->createSection($request);
         
        return redirect()->route("manage.events.sections.list", ['slug' => $request['slug']])->with(['status' => 'Section added successfully']);
    }


    public function deleteEventSection(Request $request)
    {
        $this->eventSectionService->deleteEventSection($request);

        return redirect()->back()->with(['status' => 'Section removed successfully']);
    }
}
