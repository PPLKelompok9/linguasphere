<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ExternalController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [ExternalController::class, 'index'])->name('external.index');
Route::get('/price',[ExternalController::class, 'price'])->name('external.price');
Route::get('/path', [ExternalController::class, 'path'])->name('external.path');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('role:user')->group(function(){
        Route::get('/dashboard/subscriptions/', [DashboardController::class, 'subscriptions'])->name('dashboard.subscriptions');
    });
});

require __DIR__.'/auth.php';
