<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/sertifications', [SertificationController::class, 'index'])->name('sertifications.index');
Route::get('/sertifications/{slug}', [SertificationController::class, 'show'])->name('sertifications.show');

Route::resource('scholarships', ScholarshipController::class);

Route::resource('institutions', InstitutionController::class)->parameters([
    'institutions' => 'institution:slug'
]);

Route::get('institutions/{institution:slug}/partnerships', [
    InstitutionController::class, 
    'activePartnerships'
])->name('institutions.partnerships');

require __DIR__.'/auth.php';
