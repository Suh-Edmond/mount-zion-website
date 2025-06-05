<?php

namespace App\Services;

use App\Interface\SchoolInterface;
use App\Models\Faculty;
use App\Models\School;
use Illuminate\Support\Facades\Response;

class SchoolService implements SchoolInterface, FileUploadInterface
{

    public function index($request)
    {
        return School::orderBy('name', 'DESC');
    }

    public function show($slug)
    {
        return School::where('slug', $slug)->firstOrFail();
    }

    public function getSchools($request)
    {
        return $this->index($request)->get();
    }

    public function createSchool($request)
    {
        return School::create([
            'name'        => $request['name'],
            'email'       => $request['email'],
            'telephone'   => $request['telephone'],
            'image_path'   => '',
            'region'       => $request['region'],
            'address'       => $request['address']
        ]);
    }

    public function updateSchool($request)
    {
        $school = School::where('slug', $request['slug'])->firstOrFail();
        return $school->update($request->all());
    }

    public function getSchool($request)
    {
        return School::where('slug', $request['slug'])->firstOrFail();
    }

    public function deleteSchool($request)
    {

        $deleted = School::where('slug',$request['slug'])->firstOrFail();

        $deleted->delete();
    }

    public function getContactInfos($request)
    {
        return School::select('email', 'telephone', 'address', 'name')->get();
    }

    public function uploadFile($request)
    {
        $school         = School::where('slug', $request['slug'])->firstOrFail();

        $directory      = FileUploadCategory::SCHOOL. "/". $school->slug;

        $extension      = $file->getClientOriginalExtension();

        $fileName       =   time() . '_' . uniqid() . '.' . $extension;

         try {
            $request->validate([
                'image' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);

             $request->file('image')->storeAs(FileStorageConstants::FILE_STORAGE_BASE_DIRECTORY.$directory, $fileName, 'public');

             $filePath = FileStorageConstants::FETCH_FILE_BASE_DIRECTORY.$directory."/".$fileName;

             $this->saveFile($filePath, $school);

        }catch (\Exception $exception){
            throw new BusinessValidationException($exception->getMessage(), 400);
        }
    }

    public function deleteFile($request)
    {
        $school = School::where('slug', $request['slug'])->firstOrFail();

        $directory      = FileUploadCategory::SCHOOL. "/". $school->slug;

        $uploadedFilePath = FileStorageConstants::FILE_STORAGE_BASE_DIRECTORY.$directory."/".$fileName;

        $path = public_path($uploadedFilePath);

        Storage::disk('public')->delete($path);

        $image->delete();

        return Redirect::back()->with(['status' => 'Image remove successfully']);
    }

    public function getFile($request)
    {
        $school         = School::where('slug', $request['slug'])->firstOrFail();

        $directory      = FileUploadCategory::SCHOOL. "/". $school->slug;

        $uploadedFilePath = FileStorageConstants::FETCH_FILE_BASE_DIRECTORY.$directory."/".$fileName;

        $headers = array('Content-Type: application/pdf');

        return Response::download($uploadedFilePath, $fileName, $headers);
    }

    private function saveFile($path, $school)
    {
        $school->update([
            'image_path'  => $path
        ]);
    }

    
}
