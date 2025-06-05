<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEventGalleryRequest;
use App\Services\EventGalleryService;
use Illuminate\Http\Request;

class EventGalleryController extends Controller
{
    private EventGalleryService $eventGalleryService;
    
    public function __construct(EventGalleryService $eventGalleryService)
    {
        $this->eventGalleryService = $eventGalleryService;
    }


    public function index(Request $request)
    {
         
        $data = $this->eventGalleryService->fetchGallery($request);

        $data = [
            'gallery' => $data[1],
            'event'   => $data[0],
            'hasMainImage' => $data[2]
        ];
        return view('pages.management.events.gallery.index')->with($data);
    }


    public function store(CreateEventGalleryRequest $request)
    {
        $this->eventGalleryService->addToGallery($request);

        return back()->with(['status' => 'Image saved to gallery successfully']);
    }

    public function update(CreateEventGalleryRequest $request)
    {
        $this->eventGalleryService->updateFromGallery($request);

        return back()->with(['status' => 'Image saved to gallery successfully']);
    }


    public function  delete(Request $request)
    {
        $this->eventGalleryService->deleteFromGallery($request);

        return back()->with(['status' => 'Image removed to gallery successfully']);
    }
}
