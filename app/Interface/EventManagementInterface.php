<?php

namespace App\Interface;

interface EventManagementInterface
{
    public function fetchEvents($request);

    public function createEvent($request);

    public function updateEvent($request);

    public function showEventInformation($request);

    public function fetchEventSpeakers($request);

    public function fetchEventSections($request);

    public function fetchEventGallery($request);

    public function deleteEvent($request);
}
