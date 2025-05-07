<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

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
