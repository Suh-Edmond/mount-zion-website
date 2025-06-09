<?php

namespace App\Services;

use App\Constant\ProgramType;
use App\Interface\ProgramInterface;
use App\Models\Program;
use App\Models\School;
use Illuminate\Validation\Rule;

class ProgramService implements ProgramInterface, FileUploadInterface
{

    public function index($schoolId)
    {
        return Program::where('school_id', $schoolId)->orderBy('name', 'ASC')->get();
    }

    public function show($slug)
    {
        return Program::where('slug', $slug)->firstOrFail();
    }

    public function getProgramTypes($schoolId)
    {
        if ($schoolId) {
            return Program::where('school_id', $schoolId)->distinct()->pluck('tag');
        }
        return Program::distinct()->pluck('tag');
    }

    public function listPrograms($request)
    {
        $slug = $request['slug'];
        return School::where('slug', $slug)->firstOrFail();
    }

    public function getPrograms($school_id, $program_type)
    {
        $query = Program::query();

        if ($school_id) {
            $query->where('school_id', $school_id);
        }

        if ($program_type) {
            $query->where('tag', $program_type);
        }

        return $query->orderBy('name', 'ASC')->paginate(10);
    }

    public function createProgram($request)
    {
        $slug = $request['slug'];
        return School::where('slug', $slug)->firstOrFail();
    }


    public function storeProgram($request)
    {
        $data = $this->validateRequest($request);
        $school  = School::where('slug', $data['school_slug'])->firstOrFail();
        Program::create([
            'name'      => $data['name'],
            'about'     => $data['about'],
            'tag'       => $data['tag'],
            'duration'  => $data['duration'],
            'image_path' => '',
            'school_id'  => $school->id
        ]);
    }

    public function showProgram($request)
    {
        $slug = $request['slug'];
        return Program::where('slug', $slug)->firstOrFail();
    }

    public function deleteProgram($request)
    {
        $program = Program::where('slug', $request['slug'])->firstOrFail();
        $program->delete();
    }

    public function updateProgram($request)
    {
        $data = $this->validateUpdateRequest($request);
        $program = Program::where('slug', $request['slug'])->firstOrFail();

        return $program->update($data);
    }


    public function loadPrograms()
    {
        return Program::orderBy('name', 'ASC')->get();
    }

    public function uploadFile($request)
    {
        $program         = Program::where('slug', $request['slug'])->firstOrFail();

        $directory      = FileUploadCategory::PROGRAM. "/". $program->school->slug . "/". $program->slug;

        $extension      = $file->getClientOriginalExtension();

        $fileName       =   time() . '_' . uniqid() . '.' . $extension;

         try {
            $request->validate([
                'image' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);

             $request->file('image')->storeAs(FileStorageConstants::FILE_STORAGE_BASE_DIRECTORY.$directory, $fileName, 'public');

             $filePath = FileStorageConstants::FETCH_FILE_BASE_DIRECTORY.$directory."/".$fileName;

             $this->saveFile($filePath, $program);

        }catch (\Exception $exception){
            throw new BusinessValidationException($exception->getMessage(), 400);
        }
    }

    private function saveFile($path, $program)
    {
        $program->update([
            'image_path'  => $path
        ]);
    }

    public function deleteFile($request)
    {
        $program = Program::where('slug', $request['slug'])->firstOrFail();

        $directory      = FileUploadCategory::PROGRAM. "/". $program->school->slug . "/". $program->slug;

        $uploadedFilePath = FileStorageConstants::FILE_STORAGE_BASE_DIRECTORY.$directory."/".$fileName;

        $path = public_path($uploadedFilePath);

        Storage::disk('public')->delete($path);

        $image->delete();

        return Redirect::back()->with(['status' => 'Image remove successfully']);
    }

    public function getFile($request)
    {
        $program         = Program::where('slug', $request['slug'])->firstOrFail();

        $directory       =  FileUploadCategory::PROGRAM. "/". $program->school->slug . "/". $program->slug;

        $uploadedFilePath = FileStorageConstants::FETCH_FILE_BASE_DIRECTORY.$directory."/".$fileName;

        $headers = array('Content-Type: application/pdf');

        return Response::download($uploadedFilePath, $fileName, $headers);
    }


    private function validateRequest($request)
    {
        return $request->validate([
            'name'      => 'required|string|min:5|max:255',
            'about'     => 'required|string|min:100|max:5000',
            'tag'       => ['required',  Rule::in([ProgramType::HND, ProgramType::BACHELOR, ProgramType::SPECIAL_CARE]) ],
            'duration'  => ['required', 'min:1', 'max:5'],
            'image_path' => 'required|image|mimes:jpg,jpeg,png',
            'school_slug'  => ['required', 'string']
        ]);
    }


    private function validateUpdateRequest($request)
    {
        return $request->validate([
            'name'      => 'required|string|min:5|max:255',
            'about'     => 'required|string|min:100|max:5000',
            'tag'       => ['required',  Rule::in([ProgramType::HND, ProgramType::BACHELOR, ProgramType::SPECIAL_CARE]) ],
            'duration'  => ['required', 'min:1', 'max:5'],
            'slug'      => ['required', 'string']
        ]);
    }
}
