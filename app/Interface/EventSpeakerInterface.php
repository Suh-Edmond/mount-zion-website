<?php


namespace App\Interface;

interface EventSpeakerInterface {
    public function createEventSpeaker($request);

    public function showSpeaker($request);

    public function deleteSpeaker($request);

    
}