<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SportController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Owner\VenueController;
use App\Http\Controllers\Owner\CourtController;
use App\Http\Controllers\Owner\ScheduleController;
use App\Http\Controllers\Owner\MembershipController;
use App\Http\Controllers\Player\ReservationController;

use App\Http\Controllers\Auth\SocialLoginController;
use App\Http\Controllers\Player\BookingController;
use App\Http\Controllers\Player\DashboardController;
use App\Http\Controllers\Player\VenueDetailController;

// Página principal
Route::get('/', function () {
    return view('welcome'); // Podés reemplazar con landing
});



Route::get('/auth/google', [SocialLoginController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [SocialLoginController::class, 'handleGoogleCallback']);


// Auth (Laravel Breeze ya las incluye)
require __DIR__.'/auth.php';


// =================== ADMIN ===================
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::view('/dashboard', 'cancheo.admin.dashboard')->name('dashboard');
        Route::resource('sports', SportController::class);
        Route::get('reports', [ReportController::class, 'index'])->name('reports.index');
    });


// =================== OWNER ===================
Route::middleware(['auth', 'role:owner'])
    ->prefix('owner')
    ->name('owner.')
    ->group(function () {
        Route::view('/dashboard', 'cancheo.owner.dashboard')->name('dashboard');
        Route::resource('venues', VenueController::class);
        Route::resource('courts', CourtController::class);
        Route::resource('schedules', ScheduleController::class);
        Route::resource('memberships', MembershipController::class);
    });


// =================== PLAYER ===================
Route::prefix('player')->middleware(['auth', 'role:player'])->name('player.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Flujo de reserva
    Route::get('/reservar/deporte', [BookingController::class, 'selectSport'])->name('booking.sport');
    Route::get('/reservar/ubicacion', [BookingController::class, 'selectLocation'])->name('booking.location');
    Route::get('/reservar/canchas', [BookingController::class, 'listCourts'])->name('booking.courts');

    // Detalles
    Route::get('/cancha/{id}', [VenueDetailController::class, 'show'])->name('venue.show');
});

