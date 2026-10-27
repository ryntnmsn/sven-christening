<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\GuestController;
use App\Http\Controllers\RsvpController;
use App\Http\Middleware\EnsureUserIsAdmin;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;


Route::get('/', function () {
    return view('app');
})->name('home');

Route::view('/pre-game', 'pre-game')->name('pre-game');


Route::get('/clear-route', function () {
    Artisan::call('route:clear');
    return 'Route cache cleared successfully!';
});


Route::get('/clear-cache', function () {
    Artisan::call('route:cache');
    return 'Routes cached successfully!';
});


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
    Route::put('/guests/{guest}', [GuestController::class, 'update'])->name('guests.update');
    Route::delete('/guests/{guest}', [GuestController::class, 'destroy'])->name('guests.destroy');
    Route::post('/logout', [AuthController::class, 'destroy'])->name('logout');
});



