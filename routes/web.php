<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventOrganizerController;

Route::get('/', function () {
    // Jika pengguna sudah login, arahkan ke dashboard berdasarkan role
    if (Auth::check()) {
        $user = Auth::user();
        // Redirection berdasarkan role
        if ($user->role == 'admin') {
            return redirect()->route('admin.dashboard');
        } elseif ($user->role == 'eventOrganizer') {
            return redirect()->route('eventOrganizer.dashboard');
        } elseif ($user->role == 'user') {
            return redirect()->route('user.dashboard');
        }
    }
    // Jika pengguna belum login, arahkan ke halaman login
    return redirect()->route('login');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin/dashboard', [AdminController::class, 'index'])
    ->middleware(['auth:admin'])
    ->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    //dashboard admin
    Route::get('/dashboard',[AdminController::class,'index'])->name('admin.dashboard');
});

Route::prefix('eventOrganizer')->middleware(['auth', 'eventOrganizer'])->group(function () {
    //dashboard eventOrganizer
    Route::get('/dashboard',[EventOrganizerController::class,'index'])->name('eventOrganizer.dashboard');
});

Route::prefix('user')->middleware(['auth', 'user'])->group(function () {
    //dashboard user
    Route::get('/dashboard',[UserController::class,'index'])->name('user.dashboard');
});

require __DIR__.'/auth.php';
