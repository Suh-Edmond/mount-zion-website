<?php

namespace App\Interface;

interface EventSectionInterface {
    public function createSection($request);

    public function listEventSections($request);

    public function showEventSection($request);

    public function deleteEventSection($request);
}