<?php

namespace App\Services;

use App\Constant\FileStorageConstants;
use App\Constant\FileUploadCategory;
use App\Exceptions\BusinessValidationException;
use App\Interface\AdmissionDocumentInterface;
use App\Models\Admission;
use App\Models\AdmissionDocument;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class AdmissionDocumentService implements AdmissionDocumentInterface  {
    public function uploadAdmissionDocument($request, $admission)
    {
        if(isset($request['id_card'])){
           
            $this->uploadFile($request, $admission, FileUploadCategory::ID_CARD, 'id_card');
        }

        if(isset($request['gce_cert'])){
            
            $this->uploadFile($request, $admission, FileUploadCategory::GCE_CERT, 'gce_cert');
        }

        if(isset($request["hnd_cert"])){
            
            $this->uploadFile($request, $admission, FileUploadCategory::HND_CERT, 'hnd_cert');
        }
    }

    public function downloadAdmissionDocument($request)
    {
        $this->getFile($request);
    }


    public function uploadFile($request, $admission, $type, $file_input_name)
    {

        $directory        = FileUploadCategory::ADMISSION. "/". $admission->slug . "/". $admission->program->slug. "/". $type;

        $file            = $request->file($file_input_name);

        $extension        = $file->getClientOriginalExtension();

        $fileName         =   time() . '_' . uniqid() . '.' . $extension;

         try {
            $request->file($file_input_name)->storeAs(FileStorageConstants::FILE_STORAGE_BASE_DIRECTORY.$directory, $fileName, 'public');

            $filePath = FileStorageConstants::FETCH_FILE_BASE_DIRECTORY.$directory . "/" . $fileName;

            $this->saveFile($filePath, $admission, $type);

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