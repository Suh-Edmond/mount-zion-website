<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.guest.main-website.about.index');
    }

    public function aboutCeo(Request $request)
    {
        return view('pages.guest.main-website.about.about-ceo');
    }

    public function aboutClinic(Request $request)
    {
        return view('pages.guest.main-website.about.about-clinic');
    }

    public function communityOutreach(Request $request)
    {
        return view('pages.guest.main-website.about.clinic-community-outreach');
    }
}
