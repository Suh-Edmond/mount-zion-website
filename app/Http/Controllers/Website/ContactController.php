<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SchoolService;

class ContactController extends Controller
{
    protected $schoolService;

    public function __construct(SchoolService $schoolService)
    {
        $this->schoolService = $schoolService;
    }
    public function index(Request $request)
    {
        $contacts = $this->schoolService->getContactInfos($request);
        return view('pages.guest.main-website.contact.index', [
            'contacts' => $contacts
        ]);
    }
}
