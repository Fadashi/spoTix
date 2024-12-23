<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\eventController;
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
    return app(UserController::class)->welcome();
})->name('dashboard');

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
    Route::get('/events', [EventController::class, 'index'])->name('eventOrganizer.events.index'); // Halaman daftar event
    Route::get('/events/create', [EventController::class, 'create'])->name('eventOrganizer.events.create'); // Halaman buat event baru
    Route::post('/events', [EventController::class, 'store'])->name('eventOrganizer.events.store'); // Simpan event baru
    Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('eventOrganizer.events.edit'); // Halaman edit event
    Route::put('/events/{event}', [EventController::class, 'update'])->name('eventOrganizer.events.update'); // Update event
    Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('eventOrganizer.events.destroy'); // Hapus event
});

Route::prefix('user')->middleware(['auth', 'user'])->group(function () {
    //dashboard user
    Route::get('/dashboard',[UserController::class,'index'])->name('user.dashboard');
    Route::get('/events/{id}', [EventController::class, 'show_event'])->name('user.show');
});

Route::get('/choose-register', function () {
    return view('auth.chooseRegister');
})->name('chooseRegister');

require __DIR__.'/auth.php';
