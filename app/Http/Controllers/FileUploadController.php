<?php

namespace App\Http\Controllers;

use App\Strategy\FileUploadStrategyContext as StrategyFileUploadStrategyContext;
use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function uploadDocument(Request $request)
    {
        $uploadService = new StrategyFileUploadStrategyContext($request['file_type']);

        $uploadService->uploadFile($request);

        return redirect()->back()->with(['status' => 'File uploaded successfully']);
    }
}
