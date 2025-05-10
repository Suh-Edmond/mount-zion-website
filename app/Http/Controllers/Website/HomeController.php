<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\SchoolService;

class HomeController extends Controller
{
    private SchoolService $schoolService;

    public function __construct(SchoolService $schoolService)
    {
        $this->schoolService = $schoolService;
    }

    public function index(Request $request)
    {
        $data = [
            'schools' => $this->schoolService->index($request)->paginate(2)
        ];
        return view('pages.guest.main-website.home.index')->with($data);
    }
}
