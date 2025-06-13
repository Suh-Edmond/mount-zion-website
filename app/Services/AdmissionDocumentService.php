<?php

namespace App\Services;

use App\Constant\FileStorageConstants;
use App\Constant\FileUploadCategory;
use App\Exceptions\BusinessValidationException;
use App\Interface\FileUploadInterface;
use App\Interface\AdmissionDocumentInterface;
use App\Models\Admission;
use App\Models\AdmissionDocument;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class AdmissionDocumentService implements AdmissionDocumentInterface, FileUploadInterface  {
    public function uploadAdmissionDocument($request)
    {
        if(isset($request['id_card']) && $request['id_card'] == FileUploadCategory::ID_CARD){
            $this->uploadFile($request);
        }

        if(isset($request['gce_cert']) && $request['gce_cert'] === FileUploadCategory::GCE_CERT){
            $this->uploadFile($request);
        }

        if(isset($request["hnd_cert"]) && $request['hnd_cert'] === FileUploadCategory::HND_CERT){
            $this->uploadFile($request);
        }
    }

    public function downloadAdmissionDocument($request)
    {
        $this->getFile($request);
    }

    public function uploadFile($request)
    {
        $admission         = Admission::where('slug', $request['slug'])->firstOrFail();

        $directory        = FileUploadCategory::ADMISSION. "/". $admission->slug . "/". $admission->program->slug. "/". $request['type'];

         $file            = $request->file('image');

        $extension        = $file->getClientOriginalExtension();

        $fileName         =   time() . '_' . uniqid() . '.' . $extension;

         try {
            $request->validate([
                'image' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);

             $request->file('image')->storeAs(FileStorageConstants::FILE_STORAGE_BASE_DIRECTORY.$directory, $fileName, 'public');

             $filePath = FileStorageConstants::FETCH_FILE_BASE_DIRECTORY.$directory . "/" . $fileName;

             $this->saveFile($filePath, $admission, $request['type']);

        }catch (\Exception $exception){
            throw new BusinessValidationException($exception->getMessage(), 400);
        }
    }

    public function deleteFile($request)
    {
        $admission = Admission::where('slug', $request['slug'])->firstOrFail();

        $document = AdmissionDocument::where('doc_slug', $request['slug'])->firstOrFail();

        $directory      = FileUploadCategory::ADMISSION. "/". $admission->slug . "/". $admission->program->slug. "/". $request['type'];

        $uploadedFilePath = FileStorageConstants::FILE_STORAGE_BASE_DIRECTORY.$directory."/".$document->file_path;

        $path = public_path($uploadedFilePath);

        Storage::disk('public')->delete($path);

        $document->delete();

        return Redirect::back()->with(['status' => 'Image remove successfully']);
    }

    public function getFile($request)
    {
        $admission         = Admission::where('slug', $request['slug'])->firstOrFail();

        $document = AdmissionDocument::where('doc_slug', $request['slug'])->firstOrFail();

        $directory         = FileUploadCategory::ADMISSION. "/". $admission->slug . "/". $admission->program->slug ."/". $request['type'];

        $uploadedFilePath = FileStorageConstants::FETCH_FILE_BASE_DIRECTORY.$directory."/".$document->file_path;

        $headers = array('Content-Type: application/pdf');

        return Response::download($uploadedFilePath, $document->file_path, $headers);
    }

    private function saveFile($path, $admission, $type)
    {
        AdmissionDocument::create([
            'admission_id' => $admission->id,
            'file_path'    => $path,
            'category'     => $type
        ]);
    }

}