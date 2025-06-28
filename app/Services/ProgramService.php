<?php

namespace App\Services;

use App\Constant\FileStorageConstants;
use App\Constant\FileUploadCategory;
 
use App\Interface\ProgramInterface;
use App\Interface\FileUploadInterface;
use App\Models\Program;
use App\Models\School;
use Exception;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
 

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
         
        $school  = School::where('slug', $request['school_slug'])->firstOrFail();
        $program = Program::create([
            'name'      => $request['name'],
            'about'     => $request['about'],
            'tag'       => $request['tag'],
            'duration'  => $request['duration'],
            'image_path' => '',
            'school_id'  => $school->id
        ]);

        $this->upload($program, $request);
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
         
        $program = Program::where('slug', $request['slug'])->firstOrFail();

        return $program->update($request->all());
    }


    public function loadPrograms()
    {
        return Program::orderBy('name', 'ASC')->get();
    }

    public function uploadFile($request)
    {
        $program         = Program::where('slug', $request['slug'])->firstOrFail();
        $this->upload($program, $request);
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

        $uploadedFilePath = FileStorageConstants::FILE_STORAGE_BASE_DIRECTORY.$directory."/".$program->image_path;

        $path = public_path($uploadedFilePath);

        Storage::disk('public')->delete($path);

        $program->update([
            'image_path' => ''
        ]);
    }

    public function getFile($request)
    {
        $program         = Program::where('slug', $request['slug'])->firstOrFail();

        $directory       =  FileUploadCategory::PROGRAM. "/". $program->school->slug . "/". $program->slug;

        $uploadedFilePath = FileStorageConstants::FETCH_FILE_BASE_DIRECTORY.$directory."/".$program->image_path;

        $headers = array('Content-Type: application/pdf');

        return Response::download($uploadedFilePath, $program->image_path, $headers);
    }


    public function getActiveProgramsForAdmission($id)
    {
        $school = School::findOrFail($id);
        return  $school->programs()->whereHas('admissionYears', function($query){
            $query->where('status', true);
        })->get();
    }

    public function filterPrograms($request)
    {
        $programs = Program::select("*");
        if(isset($request['school_id']) && $request['school_id'] !== "ALL"){
            $programs = $programs->where('school_id', $request['school_id']);
        }
         if(isset($sort)){
            switch ($sort) {
                case 'DATE_DESC':
                    $programs->orderBy('created_at');
                    break;
                case 'NAME':
                    $programs->orderBy('name');
                    break;
                default:
                    $programs->orderByDesc('created_at');
                    break;
            }
        }


        return $programs->orderBy('name', 'desc')->paginate(10);
    }

    private function upload($program, $request)
    {
        $directory      = FileUploadCategory::PROGRAM. "/". $program->school->slug . "/". $program->slug;
        $file           = $request['image'];

        $extension      = $file->getClientOriginalExtension();

        $fileName       =   time() . '_' . uniqid() . '.' . $extension;

         try {
            $request->validate([
                'image' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);

             $request->file('image')->storeAs(FileStorageConstants::FILE_STORAGE_BASE_DIRECTORY."/".$directory, $fileName, 'public');

             $filePath = FileStorageConstants::FETCH_FILE_BASE_DIRECTORY.$directory."/".$fileName;

             $this->saveFile($filePath, $program);

        }catch (\Exception $exception){
            throw new Exception($exception->getMessage(), 400);
        }
    }
}
