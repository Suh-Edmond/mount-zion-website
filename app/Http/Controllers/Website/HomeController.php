<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\AdmissionYear;
use App\Traits\HelperTrait;
use Illuminate\Http\Request;

use App\Services\SchoolService;

class HomeController extends Controller
{
    use HelperTrait;
    private SchoolService $schoolService;

    public function __construct(SchoolService $schoolService)
    {
        $this->schoolService = $schoolService;
    }

    public function index(Request $request)
    {
        $this->setApplicationSessionStatus();
        $data = [
            'schools' => $this->schoolService->index($request)->paginate(2)
        ];
        return view('pages.guest.main-website.home.index')->with($data);
    }

    private function setApplicationSessionStatus()
    {

        $admissionSession = AdmissionYear::where('status', true)->firstOrFail();
        if ($this->checkIfApplicationDeadlineHadExpire($admissionSession->end_date)){
            $admissionSession->update([
                'status' => 0
            ]);
        }
    }
}
