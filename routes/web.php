<?php

use App\Http\Controllers\PathController;
use App\Http\Controllers\PretestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ExternalController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ScholarshipController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
  return view('guest.Home.index');
});

Route::get('/courses', [CourseController::class, 'guestIndex'])->name('courses.guest');
Route::get('/courses/detail/{id}', [CourseController::class, 'showDetailCoursesByCategory'])->name('courses.guestDetail');

Route::get('/learning-path', [PathController::class, 'guestIndex'])->name('paths.guest');

Route::get('/scholarships', [ScholarshipController::class, 'indexGuest'])->name('scholarships.guest');

Route::match(['get', 'post'], '/transactions/payment/midtrans/notification', [TransactionController::class, 'handlePaymentNotification'])->name('external.payment_midtrans_notification');

Route::middleware('auth')->group(function () {

  Route::middleware('role:admin')->group(function () {

    $profilePath = '/profile';
    // Admin Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.admin');

    // Admin Profile
    Route::get($profilePath, [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch($profilePath, [ProfileController::class, 'update'])->name('profile.update');
    Route::delete($profilePath, [ProfileController::class, 'destroy'])->name('profile.destroy');
  });

  Route::middleware('role:user')->prefix('user')->group(function () {

    $settingsPath = '/settings';

    // User Dashboard
    Route::get('/dashboard', [ExternalController::class, 'index'])->name('dashboard.user');

    // User Settings
    Route::get($settingsPath, [SettingController::class, 'edit'])->name('setting.edit');
    Route::patch($settingsPath, [SettingController::class, 'update'])->name('setting.update');
    Route::delete($settingsPath, [SettingController::class, 'destroy'])->name('setting.destroy');

    // User Courses
    Route::get('/courses', [CourseController::class, 'userIndex'])->name('courses.user');
    Route::get('/courses/search', [CourseController::class, 'searchCourses'])->name('courses.search');
    Route::get('/courses/detail/{slug}', [CourseController::class, 'show'])->name('courses.detail');
    Route::get('/courses/checkouts/{slug}', [TransactionController::class, 'checkouts'])->name('courses.checkout');
    Route::get('/courses/checkouts-success', [TransactionController::class, 'afterCheckouts'])->name('user.checkout_success');
    Route::get('/courses/{course:slug}/{courseSection}/{sectionContent}', [CourseController::class, 'learningCourse'])->name('courses.learning');
    Route::get('/courses/{course:slug}/finished', [CourseController::class, 'learningFinished'])->name('courses.finished');

    // User PreTest
    Route::get('/pretest', [PretestController::class, 'index'])->name('pretest');
    Route::get('/pretest/{slug}', [PretestController::class, 'showTest'])->name('pretest.test');
    Route::post('/pretest/{slug}', [PretestController::class, 'showTest']);

    // User Roadmaps
    Route::get('/paths', [PathController::class, 'index'])->name('paths.index');

    // User Transactions
    Route::get('/transactions/checkouts/{id}', [TransactionController::class, 'checkoutsGuest'])->name('guest.checkouts');
    Route::get('/transactions/history', [TransactionController::class, 'historyCheckouts'])->name('subscriptions.history');
    Route::get('/subscriptions/{transaction}', [SubscriptionController::class, 'subscriptionDetail'])
      ->name('user.subscriptions.detail');

    Route::post('/payment/midtrans', [TransactionController::class, 'paymentMidtrans'])->name('transaction.payment_midtrans');

    // User Scholarships
    Route::get('/scholarships', [ScholarshipController::class, 'index'])->name('scholarships.index');
    Route::get('/scholarships/{id}/details', [ScholarshipController::class, 'show'])->name('scholarships.detail');
    Route::get('/scholarships/{scholarship}/apply', [ScholarshipController::class, 'applyForScholarship'])->name('scholarships.apply');
  });
});

require __DIR__ . '/auth.php';
