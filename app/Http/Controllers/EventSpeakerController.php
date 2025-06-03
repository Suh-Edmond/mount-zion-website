<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEventSpeakerRequest;
use App\Models\Event;
use App\Services\EventSpeakerService;
use Illuminate\Http\Request;

class EventSpeakerController extends Controller
{
    private EventSpeakerService $eventSpeakerService;

    public function __construct(EventSpeakerService $ev)
    {
        $this->eventSpeakerService = $ev;   
    }


    public function listSpeakers(Request $request)
    {
        $slug = $request['slug'];
        $event = Event::where('slug', $slug)->first();
        $speakers = $event->speakers()->orderBy('name', 'desc')->get();

        $data = [
            'event' => $event,
            'speakers' => $speakers
        ];

        return view('pages.management.events.speakers.index')->with($data);
    }

    public function createSpeakers(Request $request)
    {
        $event = Event::where('slug', $request['slug'])->firstOrFail();

        $data = [
            'event' => $event
        ];

        return view('pages.management.events.speakers.create')->with($data);
    }


    public function showSpeakers(Request $request){

    }

    public function storeSpeakers(CreateEventSpeakerRequest $request)
    {
        $this->eventSpeakerService->createEventSpeaker($request);

        return redirect()->route('manage.events.speakers.list', ['slug' => $request['slug']])->with(['status' => 'Speaker added successfully']);
    }
}
