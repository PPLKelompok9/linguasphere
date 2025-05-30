<?php

use App\Http\Controllers\Pretest\PretestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ExternalController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ScholarshipController;
use App\Http\Controllers\SertificationController;
use App\Http\Controllers\InstitutionController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
  return view('welcome');
});

Route::match(['get', 'post'], '/transactions/payment/midtrans/notification',[ExternalController::class, 'handlePaymentNotification'])->name('external.payment_midtrans_notification');


Route::get('/dashboard', function () {
  return view('homepage.main');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/path', [FrontController::class, 'path'])->name('front.path');

Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/home', function () {
  return redirect()->route('dashboard');
})->name('home');



Route::get('/pretest', [PretestController::class, 'index'])->name('pretest');
Route::get('/pretest/{slug}', [PretestController::class, 'show'])->name('pretest.show');

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', [ExternalController::class, 'index'])->name('external.index');
Route::get('/price',[ExternalController::class, 'price'])->name('external.price');
Route::get('/path', [ExternalController::class, 'path'])->name('external.path');

Route::middleware(['auth'])->group(function () {
  
    // Scholarship routes
    Route::get('/scholarships', [ScholarshipController::class, 'index'])->name('scholarships.index');
    Route::get('/scholarships/{scholarship}', [ScholarshipController::class, 'show'])->name('scholarships.show');
    Route::post('/scholarships/{scholarship}/apply', [ScholarshipController::class, 'apply'])->name('scholarships.apply');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('role:user')->group(function(){
      Route::get('/user/dashboard', [ExternalController::class, 'index'])->name('external.dashboard');
      Route::get('/courses', [CourseController::class, 'index'])->name('external.course');
      Route::get('/courses/detail/{id}', [CourseController::class, 'showDetailCoursesByCategory'])->name('courses.detail');
      Route::get('/transactions/checkouts/{id}', [ExternalController::class, 'checkouts'])->name('external.checkouts');
      Route::get('/transactions/checkouts-success', [ExternalController::class, 'afterCheckouts'])->name('external.checkout_success');
      Route::get('/transactions/history', [ExternalController::class, 'historyCheckouts'])->name('external.history_checkouts');
      Route::post('/payment/midtrans', [ExternalController::class, 'paymentMidtrans'])->name('external.payment_midtrans');
      Route::get('/dashboard/subscriptions/', [DashboardController::class, 'subscriptions'])->name('dashboard.subscriptions');
      Route::get('/user/courses/{course:slug}/{courseSection}/{sectionContent}', [CourseController::class, 'learningCourse'])->name('courses.learning');
       Route::get('/user/courses/{course:slug}/finished', [CourseController::class, 'learningFinished'])->name('courses.finished');
    });
});

Route::get('/sertifications', [SertificationController::class, 'index'])->name('sertifications.index');
Route::get('/sertifications/{slug}', [SertificationController::class, 'show'])->name('sertifications.show');

require __DIR__.'/auth.php';
