<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\ProfileController;
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

Route::middleware(['auth', 'verified'])->prefix('dashboard')->group(function (){
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('academics', [FacultyController::class, 'index'])->name('manage.academics');
    Route::get('academics-create', [FacultyController::class, 'createFaculty'])->name('manage.academics.create');
    Route::post('academics-store', [FacultyController::class, 'storeFaculty'])->name('manage.academics.store');
    Route::get('academics/details', [FacultyController::class, 'showFaculty'])->name('manage.academics.show');
    Route::delete('academics/delete', [FacultyController::class, 'deleteFaculty'])->name('manage.academics.destroy');
    Route::put('academics/details/edit', [FacultyController::class, 'updateFaculty'])->name('manage.academic.edit');
    Route::get('academics/departments-listing', [DepartmentController::class, 'index'])->name('manage.academics.departments.list');
    Route::get('academics/departments-listing/details', [DepartmentController::class, 'show'])->name('manage.academics.departments.show');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
