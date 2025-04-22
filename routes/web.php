<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ExternalController;
use App\Http\Controllers\ScholarshipController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', [ExternalController::class, 'index'])->name('external.index');
Route::get('/price',[ExternalController::class, 'price'])->name('external.price');
Route::get('/path', [ExternalController::class, 'path'])->name('external.path');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Scholarship routes
    Route::get('/scholarships', [ScholarshipController::class, 'index'])->name('scholarships.index');
    Route::get('/scholarships/{scholarship}', [ScholarshipController::class, 'show'])->name('scholarships.show');
    Route::post('/scholarships/{scholarship}/apply', [ScholarshipController::class, 'apply'])->name('scholarships.apply');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('role:user')->group(function(){
        Route::get('/dashboard/subscriptions/', [DashboardController::class, 'subscriptions'])->name('dashboard.subscriptions');
    });
});

Route::get('/sertifications', [SertificationController::class, 'index'])->name('sertifications.index');
Route::get('/sertifications/{slug}', [SertificationController::class, 'show'])->name('sertifications.show');

require __DIR__.'/auth.php';
