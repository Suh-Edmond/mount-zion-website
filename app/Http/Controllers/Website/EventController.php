<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.guest.main-website.event.index');
    }

    public function detail(Request $request)
    {
        return view('pages.guest.main-website.event.detail');
    }
}
