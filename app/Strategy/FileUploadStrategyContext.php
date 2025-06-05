<?php
use App\Constant\FileUploadCategory;
class FileUploadStrategyContext {
    private FileUploadInterface $strategy;

    public function __construct($file_type)
    {
        $this->strategy = match ($file_type) {
            FileUploadCategory::SCHOOL => new SchoolService(),
            FileUploadCategory::PROGRAM => new ProgramService(),
            FileUploadCategory::SPEAKER => new EventSpeakerService(),
            FileUploadCategory::GALLERY => new EventGalleryService(),
            FileUploadCategory::ADMISSION => new AdmissionApplicantService()
        }
    }


    public function uploadFile($request)
    {
        return $this->strategy->uploadFile($request);
    }
}