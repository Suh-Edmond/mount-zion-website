<?php

use App\Http\Controllers\AdmissionYearController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\Website\AboutController;
use App\Http\Controllers\Website\AcademicController;
use App\Http\Controllers\Website\AdmissionController;
use App\Http\Controllers\Website\AlumniController;
use App\Http\Controllers\Website\BlogController;
use App\Http\Controllers\Website\CampusController;
use App\Http\Controllers\Website\ContactController;
use App\Http\Controllers\Website\EventController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\ScholarshipController;
use App\Http\Controllers\Website\TuitionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('main.home');
Route::get('/contact', [ContactController::class, 'index'])->name('main.contact');
Route::get('/blogs', [BlogController::class, 'index'])->name('main.blog');
Route::get('/blogs-detail', [BlogController::class, 'detail'])->name('main.blog.detail');
Route::get('/events', [EventController::class, 'index'])->name('main.event');
Route::get('/event-detail', [EventController::class, 'detail'])->name('main.event.detail');
Route::get('/academics', [AcademicController::class, 'index'])->name('main.academics');
Route::get('/academic-area', [AcademicController::class, 'academicArea'])->name('main.academic-area');
Route::get('/programs', [AcademicController::class, 'academicArea'])->name('main.programs');
Route::get('/about', [AboutController::class, 'index'])->name('main.about');
Route::get('/admissions', [AdmissionController::class, 'index'])->name('main.admission');
Route::get('/campus-life', [CampusController::class, 'index'])->name('main.campus-life');
Route::get('/scholarships', [ScholarshipController::class, 'index'])->name('main.scholarship');
Route::get('tuition-fee', [TuitionController::class, 'index'])->name('main.tuition-fee');
Route::get('alumni', [AlumniController::class, 'index'])->name('main.alumni');

Route::get('academics/schools/{slug}', [AcademicController::class, 'school'])->name('main.schools.show');
Route::get('academics/schools/{schoolSlug}/{programSlug}', [AcademicController::class, 'program'])->name('main.schools.program.show');

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

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
