<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
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
        \Log::info('Login attempt for: ' . $request->email);
        
        $request->authenticate();
        
        \Log::info('Authentication successful. Session ID before regen: ' . $request->session()->getId());

        $request->session()->regenerate();
        
        \Log::info('Session regenerated. New ID: ' . $request->session()->getId());
        \Log::info('Auth::check() status: ' . (Auth::check() ? 'true' : 'false'));
        \Log::info('User ID: ' . Auth::id());

        return redirect()->intended(RouteServiceProvider::HOME);
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
}
