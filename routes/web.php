<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\GuestController;
use App\Http\Controllers\RsvpController;
use App\Http\Middleware\EnsureUserIsAdmin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app');
})->name('home');

Route::post('/rsvp/lookup', [RsvpController::class, 'lookup'])
    ->middleware('throttle:20,1')
    ->name('rsvp.lookup');
Route::post('/rsvp/confirm', [RsvpController::class, 'confirm'])
    ->middleware('throttle:20,1')
    ->name('rsvp.confirm');

Route::middleware('guest')->group(function () {
    Route::get('/admin/login', [AuthController::class, 'create'])->name('admin.login');
    Route::post('/admin/login', [AuthController::class, 'store'])
        ->middleware('throttle:5,1')
        ->name('admin.login.store');
});

Route::middleware(['auth', EnsureUserIsAdmin::class])->prefix('admin')->name('admin.')->group(function () {
    Route::redirect('/', '/admin/invite')->name('dashboard');
    Route::get('/invite', [GuestController::class, 'index'])->name('invite');
    Route::post('/guests', [GuestController::class, 'store'])->name('guests.store');
    Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');
});



