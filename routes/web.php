<?php

use App\Http\Controllers\PathController;
use App\Http\Controllers\PretestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ExternalController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ScholarshipController;
use App\Http\Controllers\SertificationController;
use App\Http\Controllers\InstitutionController;
use Illuminate\Support\Facades\Route;


// Routing Guest
Route::get('/', function () {
  return view('guest.Home.index');
});

Route::get('/courses', [CourseController::class, 'guestIndex'])->name('courses.guest');
Route::get('/courses/detail/{id}', [CourseController::class, 'showDetailCoursesByCategory'])->name('courses.guestDetail');



// Routing User
Route::middleware('auth')->group(function () {
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

  Route::middleware('role:user')->prefix('user')->group(function () {
    Route::get('/dashboard', [ExternalController::class, 'index'])->name('dashboard.user');
    Route::get('/courses', [CourseController::class, 'userIndex'])->name('courses.user');
    Route::get('/courses/detail/{slug}', [CourseController::class, 'show'])->name('courses.detail');
    Route::get('/courses/checkouts/{slug}', [ExternalController::class, 'checkouts'])->name('courses.checkout');
    Route::get('/courses/{course:slug}/{courseSection}/{sectionContent}', [CourseController::class, 'learningCourse'])->name('courses.learning');
    Route::get('/courses/{course:slug}/finished', [CourseController::class, 'learningFinished'])->name('courses.finished');

    Route::get('/pretest', [PretestController::class, 'index'])->name('pretest');
    Route::get('/pretest/{slug}', [PretestController::class, 'showTest'])->name('pretest.test');
    Route::post('/pretest/{slug}', [PretestController::class, 'showTest']);

    Route::get('/paths', [PathController::class, 'index'])->name('paths.index');

    Route::get('/transactions/checkouts/{id}', [ExternalController::class, 'checkouts'])->name('external.checkouts');
    Route::get('/transactions/checkouts-success', [ExternalController::class, 'afterCheckouts'])->name('external.checkout_success');
    Route::get('/transactions/history', [ExternalController::class, 'historyCheckouts'])->name('external.history_checkouts');
    Route::post('/payment/midtrans', [ExternalController::class, 'paymentMidtrans'])->name('external.payment_midtrans');
    Route::get('/dashboard/subscriptions/', [DashboardController::class, 'subscriptions'])->name('dashboard.subscriptions');
  });
});


Route::match(['get', 'post'], '/transactions/payment/midtrans/notification', [ExternalController::class, 'handlePaymentNotification'])->name('external.payment_midtrans_notification');


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


// Route::get('/', [ExternalController::class, 'index'])->name('external.index');
Route::get('/price', [ExternalController::class, 'price'])->name('external.price');
Route::get('/path', [ExternalController::class, 'path'])->name('external.path');

Route::middleware(['auth'])->group(function () {

  // Scholarship routes
  Route::get('/scholarships', [ScholarshipController::class, 'index'])->name('scholarships.index');
  Route::get('/scholarships/{scholarship}', [ScholarshipController::class, 'show'])->name('scholarships.show');
  Route::post('/scholarships/{scholarship}/apply', [ScholarshipController::class, 'apply'])->name('scholarships.apply');
});

Route::get('/sertifications', [SertificationController::class, 'index'])->name('sertifications.index');
Route::get('/sertifications/{slug}', [SertificationController::class, 'show'])->name('sertifications.show');

require __DIR__ . '/auth.php';
