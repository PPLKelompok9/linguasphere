<?php

use App\Http\Controllers\Pretest\PretestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ExternalController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return redirect()->route('dashboard');
});


Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/detail', [CourseController::class, 'detail'])->name('courses.detail');

Route::get('/dashboard', function () {
  return view('homepage.main');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

  Route::middleware('role:user')->group(function () {
    Route::get('/dashboard/subscriptions/', [DashboardController::class, 'subscriptions'])->name('dashboard.subscriptions');
  });
});

Route::get('/home', function () {
  return redirect()->route('dashboard');
})->name('home');



Route::get('/pretest', [PretestController::class, 'index'])->name('pretest');
Route::get('/pretest/{slug}', [PretestController::class, 'show'])->name('pretest.show');

Route::get('/sertifications', [SertificationController::class, 'index'])->name('sertifications.index');
Route::get('/sertifications/{slug}', [SertificationController::class, 'show'])->name('sertifications.show');

require __DIR__ . '/auth.php';
