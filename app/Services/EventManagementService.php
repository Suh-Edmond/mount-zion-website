<?php

namespace App\Services;

use App\Interface\EventManagementInterface;
use App\Models\Event;

class EventManagementService implements EventManagementInterface
{

    public function fetchEvents($request)
    {
        $sort = $request['sort'];
        $events = Event::select("*");

        if(isset($sort)){
            switch ($sort) {
                case 'DATE_DESC':
                    $events->orderBy('created_at');
                    break;
                case 'NAME':
                    $events->orderBy('name');
                    break;
                default:
                    $events->orderByDesc('created_at');
                    break;
            }
        }

        return $events->orderBy('created_at', 'DESC')->paginate(10);
    }

    public function createEvent($request)
    {
        Event::create([
            'about'         => $request['about'],
            'title'         => $request['title'],
            'location'      => $request['location'],
            'venue'         => $request['venue'],
            'phone'         => $request['phone'],
            'email'         => $request['email'],
            'website'       => $request['website'],
            'event_time'    => $request['event_time'],
            'event_date'    => $request['event_date']
        ]);
    }

    public function updateEvent($request)
    {

        $event = Event::where('slug', $request['slug'])->firstOrFail();

        $event->update([
            'about'         => $request['about'],
            'title'         => $request['title'],
            'location'      => $request['location'],
            'venue'         => $request['venue'],
            'phone'         => $request['phone'],
            'email'         => $request['email'],
            'website'       => $request['website'],
            'event_time'    => $request['event_time'],
            'event_date'    => $request['event_date']
        ]);
        $event->refresh();
    }

    public function showEventInformation($request)
    {
        return Event::where('slug', $request['slug'])->firstOrFail();
    }

    public function fetchEventSpeakers($request)
    {
        // TODO: Implement fetchEventSpeakers() method.
    }

    public function fetchEventSections($request)
    {
        // TODO: Implement fetchEventSections() method.
    }

    public function fetchEventGallery($request)
    {
        // TODO: Implement fetchEventGallery() method.
    }

    public function deleteEvent($request)
    {
        // TODO: Implement deleteEvent() method.
    }



}
