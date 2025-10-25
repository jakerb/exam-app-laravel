<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ExamsController;
use App\Http\Controllers\BookingsController;
use App\Http\Controllers\ResultController;

// Always redirect / to dashboard
Route::get('/', function () {
    return redirect('/dashboard');
});

// Redirect /home to /dashboard
Route::get('/home', function () {
    return redirect('/dashboard');
})->name('home');


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    
    Route::prefix('dashboard')->group(function () {
        Route::resource('exams', ExamsController::class);
        Route::resource('bookings', BookingsController::class);
        Route::resource('results', ResultController::class);

        Route::get('/bookings/create/{exam}', [App\Http\Controllers\BookingsController::class, 'create'])->name('bookings.create');

    });
});


