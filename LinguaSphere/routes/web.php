<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SertificationController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sertifications', [SertificationController::class, 'index'])->name('sertifications.index');
Route::get('/sertifications/{slug}', [SertificationController::class, 'show'])->name('sertifications.show');

