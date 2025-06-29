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
use App\Http\Controllers\ProfileController;

use App\Models\User;

/*--------------------------------------------------------------------------
| Rutas Públicas
|--------------------------------------------------------------------------*/
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Autenticación social
Route::get('/auth/google', [SocialLoginController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [SocialLoginController::class, 'handleGoogleCallback']);

// Autenticación Breeze
require __DIR__.'/auth.php';

/*--------------------------------------------------------------------------
| Rutas Protegidas (requieren autenticación)
|--------------------------------------------------------------------------*/
Route::middleware(['auth'])->group(function () {
    // Dashboard principal con redirección por rol
    Route::get('/dashboard', function () {
        $user = auth()->user();

        return match(true) {
            $user->hasRole('admin') => redirect()->route('admin.dashboard'),
            $user->hasRole('owner') => redirect()->route('owner.dashboard'),
            $user->hasRole('player') => redirect()->route('player.dashboard'),
            default => redirect()->route('home'),
        };
    })->name('dashboard');

    /*--------------------------------------------------------------------------
    | Perfil de Usuario
    |--------------------------------------------------------------------------*/
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::put('password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
    });

    /*--------------------------------------------------------------------------
    | Área de Administrador
    |--------------------------------------------------------------------------*/
    Route::middleware(['role:admin'])
        ->prefix('admin')
        ->name('admin.')
        ->group(function () {
            Route::view('/dashboard', 'cancheo.admin.dashboard')->name('dashboard');
            Route::resource('sports', SportController::class);
            Route::get('reports', [ReportController::class, 'index'])->name('reports.index');
        });

    /*--------------------------------------------------------------------------
    | Área de Dueños
    |--------------------------------------------------------------------------*/
    Route::middleware(['role:owner'])
        ->prefix('owner')
        ->name('owner.')
        ->group(function () {
            Route::view('/dashboard', 'cancheo.owner.dashboard')->name('dashboard');
            Route::resource('venues', VenueController::class);
            Route::resource('courts', CourtController::class);
            Route::resource('schedules', ScheduleController::class);
            Route::resource('memberships', MembershipController::class);
        });

    /*--------------------------------------------------------------------------
    | Área de Jugadores
    |--------------------------------------------------------------------------*/
    Route::middleware(['role:player'])
        ->prefix('player')
        ->name('player.')
        ->group(function () {
            // Dashboard
            Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

            // Flujo de reserva
            Route::prefix('reservar')->name('booking.')->group(function () {
                Route::get('/deporte', [BookingController::class, 'selectSport'])->name('sport');
                Route::get('/ubicacion', [BookingController::class, 'selectLocation'])->name('location');
                Route::get('/canchas', [BookingController::class, 'listCourts'])->name('courts');
            });

            // Detalles de cancha
            Route::get('/cancha/{venue}', [VenueDetailController::class, 'show'])->name('venue.show');

            // Gestión de reservas
            Route::resource('reservations', ReservationController::class)->except(['create', 'store']);
        });
});
