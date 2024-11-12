<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LandingPageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingPageController::class, 'index'])->name('landingPage.index');


Route::get('/admin/dashboard', function () {
    return view('lms.admin.dashboard');
})->middleware(['auth', 'verified'])->name('admin.dashboard');
Route::get('/instuctor/dashboard', function () {
    return view('lms.instuctor.dashboard');
})->middleware(['auth', 'verified'])->name('instuctor.dashboard');
Route::get('/student/dashboard', function () {
    return view('lms.student.dashboard');
})->middleware(['auth', 'verified'])->name('student.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
