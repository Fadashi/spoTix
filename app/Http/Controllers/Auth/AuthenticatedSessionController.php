<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    /**
     * Display the login view for Event Organizer.
     */
    public function createEO(): View
    {
        return view('auth.loginEO');
    }

    /**
     * Handle an incoming authentication request for Event Organizer.
     */
    public function storeEO(LoginRequest $request): RedirectResponse
    {
        // Autentikasi pengguna
        $request->authenticate();

        // Cek apakah pengguna memiliki role 'eventOrganizer'
        if (Auth::user()->role !== 'eventOrganizer') {
            Auth::logout();
            return redirect()->route('loginEO')->withErrors(['email' => 'You are not authorized to login as an Event Organizer.']);
        }

        $request->session()->regenerate();
        return redirect()->intended(route('eventOrganizer.dashboard'));
    }

    // Metode untuk login biasa
    public function storeUser(LoginRequest $request): RedirectResponse
    {
        // Autentikasi pengguna
        $request->authenticate();

        // Cek apakah pengguna memiliki role 'user'
        if (Auth::user()->role !== 'user') {
            Auth::logout();
            return redirect()->route('login')->withErrors(['email' => 'You are not authorized to login as a user.']);
        }

        $request->session()->regenerate();
        return redirect()->intended(route('user.dashboard'));
    }

    public function createAdmin()
    {
        return view('auth.adminLogin'); // Buat view adminLogin.blade.php
    }

    public function storeAdmin(LoginRequest $request): RedirectResponse
    {
        // Autentikasi pengguna
        $request->authenticate();

        // Cek apakah pengguna memiliki role 'admin'
        if (Auth::user()->role !== 'admin') {
            Auth::logout();
            return redirect()->route('admin.login')->withErrors(['email' => 'You are not authorized to login as an admin.']);
        }

        $request->session()->regenerate();
        return redirect()->intended(route('admin.dashboard'));
    }
}
