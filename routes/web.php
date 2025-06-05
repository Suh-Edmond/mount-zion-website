<?php

use App\Http\Controllers\AdmissionYearController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventGalleryController;
use App\Http\Controllers\EventSectionController;
use App\Http\Controllers\EventSpeakerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\Website\AboutController;
use App\Http\Controllers\Website\AcademicController;
use App\Http\Controllers\Website\AdmissionController;
use App\Http\Controllers\Website\AlumniController;
use App\Http\Controllers\Website\CampusController;
use App\Http\Controllers\Website\ContactController;
use App\Http\Controllers\Website\EventController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\ScholarshipController;
use App\Http\Controllers\Website\TuitionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('main.home');
Route::get('/contact', [ContactController::class, 'index'])->name('main.contact');
Route::get('/events', [EventController::class, 'index'])->name('main.event');
Route::get('/events/{slug}', [EventController::class, 'detail'])->name('main.event.detail');
Route::get('/academic-area', action: [AcademicController::class, 'academicArea'])->name('main.academic-area');
Route::get('/staff', action: [AcademicController::class, 'staff'])->name('main.staff');
Route::get('/programs', [AcademicController::class, 'academicArea'])->name('main.programs');
Route::get('/about', [AboutController::class, 'index'])->name('main.about');
Route::get('/about-ceo', [AboutController::class, 'aboutCeo'])->name('main.ceo');
Route::get('/about-clinic', [AboutController::class, 'aboutClinic'])->name('main.clinic');
Route::get('/community-outreach-to-tingo', [AboutController::class, 'communityOutreach'])->name('main.communityOutreach');
Route::get('/admissions', [AdmissionController::class, 'index'])->name('main.admission');
Route::get('/campus-life', [CampusController::class, 'index'])->name('main.campus-life');
Route::get('/scholarships', [ScholarshipController::class, 'index'])->name('main.scholarship');
Route::get('/donate', [ScholarshipController::class, 'index'])->name('main.donate');

Route::get('tuition-fee', [TuitionController::class, 'index'])->name('main.tuition-fee');
Route::get('alumni', [AlumniController::class, 'index'])->name('main.alumni');
Route::post('/admissions/add-applicant', [AdmissionController::class, 'addApplicant'])->name('main.admission.applicant.store');
Route::get('academics/schools/{slug}', [AcademicController::class, 'school'])->name('main.schools.show');
Route::get('academics/schools/{schoolSlug}/{programSlug}', [AcademicController::class, 'program'])->name('main.schools.program.show');
Route::get('/academics/{id}/load-programs', [ProgramController::class, 'fetchProgramsBySchool'])->name('main.schools.programs.fetch-all');

Route::middleware(['auth', 'verified'])->prefix('dashboard')->group(function (){
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/academics', [SchoolController::class, 'index'])->name('manage.academics');
    Route::get('/academics-create', [SchoolController::class, 'createSchool'])->name('manage.academics.create');
    Route::post('/academics-store', [SchoolController::class, 'storeSchool'])->name('manage.academics.store');
    Route::get('/academics/details', [SchoolController::class, 'showSchool'])->name('manage.academics.show');
    Route::delete('/academics/delete', [SchoolController::class, 'deleteSchool'])->name('manage.academics.destroy');
    Route::put('academics/details/edit', [SchoolController::class, 'updateSchool'])->name('manage.academic.edit');
    Route::get('academics/programs-listing', [ProgramController::class, 'listPrograms'])->name('manage.academics.programs.list');
    Route::get('academics/programs-listing/details', [ProgramController::class, 'show'])->name('manage.academics.programs.show');
    Route::get('academics/programs-listing/create', [ProgramController::class, 'createProgram'])->name('manage.academics.programs.create');
    Route::post('academics/programs-listing/store', [ProgramController::class, 'storeProgram'])->name('manage.academics.programs.store');
    Route::delete('academics/programs-listing/delete', [ProgramController::class, 'deleteProgram'])->name('manage.academics.programs.delete');
    Route::delete('academics/programs-listing/store/edit-upload-image', [ProgramController::class, 'editUploadProgramImage'])->name('manage.academics.programs.edit-upload-image');
    Route::put('academics/programs-listing/update', [ProgramController::class, 'editProgram'])->name('manage.academics.programs.edit');
    Route::get('admission', [SchoolController::class, 'getSchools'])->name('manage.admission');
    Route::get('admission/years', [AdmissionYearController::class, 'index'])->name('manage.admission.years');
    Route::post('admission/years/store', [AdmissionYearController::class, 'createAdmissionYear'])->name('manage.admission.years.create');
    Route::delete('admission/years/remove', [AdmissionYearController::class, 'removeAdmissionYear'])->name('manage.admission.years.remove');
    Route::get('admission/year/applicants', [AdmissionController::class, 'getApplications'])->name('manage.admission.applicants');
    Route::get('admission/year/applicants/profile', [AdmissionController::class, 'viewApplication'])->name('manage.admission.applicants.show');
    Route::put('admission/years/update', [AdmissionYearController::class, 'updateAdmissionYear'])->name('manage.admission.years.edit');
    Route::delete('admission/year/applicants/profile/remove', [AdmissionController::class, 'deleteApplication'])->name('manage.admission.applicants.delete');
    Route::put('admission/year/applicants/profile/validate-application', [AdmissionController::class, 'validateApplication'])->name('manage.admission.applicant.validate-application');
    Route::get('admission/year/applicants/create-application', [AdmissionController::class, 'createApplication'])->name('manage.admission.applicant.create-application');
    Route::post('admission/year/applicants/add-application/store', [AdmissionController::class, 'saveApplication'])->name('manage.admission.applicant.store-application');
    Route::get('events-management', [EventController::class, 'fetchEvents'])->name('manage.events');
    Route::get('events-management/information', [EventController::class, 'showEventInformation'])->name('manage.events.show');
    Route::get('events-management/create', [EventController::class, 'createEvent'])->name('manage.events.create');
    Route::put('/events-management/update', [EventController::class, 'updateEvent'])->name('manage.events.update');
    Route::get('events-management/detail/speakers', [EventSpeakerController::class, 'listSpeakers'])->name('manage.events.speakers.list');
    Route::get('events-management/detail/speakers/information', [EventSpeakerController::class, 'showSpeaker'])->name('manage.events.speakers.show');
    Route::get('events-management/detail/speakers/create', [EventSpeakerController::class, 'createSpeaker'])->name('manage.events.speakers.create');
    Route::post('events-management/detail/speakers/store', [EventSpeakerController::class, 'storeSpeaker'])->name('manage.events.speakers.store');
    Route::put('events-management/detail/speakers/update', [EventSpeakerController::class, 'updateSpeaker'])->name('manage.events.speakers.update');
    Route::delete('events-management/detail/speakers/remove', [EventSpeakerController::class, 'deleteSpeaker'])->name('manage.events.speakers.delete');
    Route::post('events-management/detail/speakers/picture/update', [EventSpeakerController::class, 'updateSpeakerPicture'])->name('manage.events.speakers.update-picture');
    Route::get('events-managment/detail/sections/list', [EventSectionController::class, 'listEventSections'])->name('manage.events.sections.list');
    Route::post('events-managment/detail/sections/add', [EventSectionController::class, 'addEventSection'])->name('manage.events.sections.create');
    Route::delete('events-managment/detail/sections/remove', [EventSectionController::class, 'deleteEventSection'])->name('manage.events.section.delete');
    Route::get('events-managment/detail/gallery/list', [EventGalleryController::class, 'index'])->name('manage.events.gallery.list');
    Route::post('events-managment/detail/gallery/add', [EventGalleryController::class, 'store'])->name('manage.events.gallery.create');
    Route::put('events-managment/detail/gallery/update', [EventGalleryController::class, 'update'])->name('manage.events.gallery.update');
    Route::delete('events-managment/detail/gallery/remove', [EventGalleryController::class, 'delete'])->name('manage.events.gallery.delete');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
