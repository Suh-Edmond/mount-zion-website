<?php

namespace App\Services;

class AdmissionDocumentService implements AdmissionDocumentInterface, FileUploadInterface  {
    public function uploadAdmissionDocument($request)
    {
        if(isset($request('id_card'))){
            $this->uploadFile($request);
        }

        if(isset($request['gce_cert'])){
            $this->uploadFile($request);
        }

        if(isset($request["hnd_cert"])){
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

        $directory        = FileUploadCategory::ADMISSION. "/". $admission->slug . "/". $admission->program->slug "/". $request['type'];

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

        $directory      = FileUploadCategory::ADMISSION. "/". $admission->slug . "/". $admission->program->slug "/". $request['type'];

        $uploadedFilePath = FileStorageConstants::FILE_STORAGE_BASE_DIRECTORY.$directory."/".$fileName;

        $path = public_path($uploadedFilePath);

        Storage::disk('public')->delete($path);

        $image->delete();

        return Redirect::back()->with(['status' => 'Image remove successfully']);
    }

    public function getFile($request)
    {
        $admission         = Admission::where('slug', $request['slug'])->firstOrFail();

        $directory         = FileUploadCategory::ADMISSION. "/". $admission->slug . "/". $admission->program->slug "/". $request['type'];

        $uploadedFilePath = FileStorageConstants::FETCH_FILE_BASE_DIRECTORY.$directory."/".$fileName;

        $headers = array('Content-Type: application/pdf');

        return Response::download($uploadedFilePath, $fileName, $headers);
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