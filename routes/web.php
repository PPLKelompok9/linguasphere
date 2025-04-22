<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\SubscriptionController;

Route::get('/', function () {
    return view('welcome');
});

// Course Routes
Route::get('/english-course', [CourseController::class, 'english']);
Route::get('/germani-course', [CourseController::class, 'german']);

// Library Routes
Route::get('/libraries', [LibraryController::class, 'index']);

// Certificate Routes
Route::get('/certificate', [CertificateController::class, 'index']);

// Weekly Test Routes
Route::get('/test-mingguan', [TestController::class, 'index']);

// Subscription Routes
Route::get('/langganan', [SubscriptionController::class, 'index']);