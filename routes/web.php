<?php

use Illuminate\Support\Facades\Route;

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
    
    // Exams
    Route::get('/dashboard/exams', [App\Http\Controllers\ExamsController::class, 'index'])->name('exams.index');
    Route::get('/dashboard/exams/{exam}', [App\Http\Controllers\ExamsController::class, 'show'])->name('exams.view');

    // Bookings
    Route::get('/dashboard/bookings', [App\Http\Controllers\BookingsController::class, 'index'])->name('booking.index');
    Route::get('/dashboard/bookings/{booking}', [App\Http\Controllers\BookingsController::class, 'show'])->name('booking.view');
    Route::get('/dashboard/bookings/edit/{booking}', [App\Http\Controllers\BookingsController::class, 'edit'])->name('booking.edit');

    // Results
    Route::get('/dashboard/results/edit/{result}', [App\Http\Controllers\ResultsController::class, 'edit'])->name('results.edit');

});


