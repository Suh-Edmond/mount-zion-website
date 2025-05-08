<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CampusController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.guest.main-website.campus-life.index');
    }
}
