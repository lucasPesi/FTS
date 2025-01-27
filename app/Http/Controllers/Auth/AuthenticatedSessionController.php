<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends controller
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

        $user = Auth::user();

        if ($user->can('planning')) {
            return redirect()->route('planningdashboard.index');
        } elseif ($user->can('klant')) {
            return redirect()->route('klantendashboard.index');
        } elseif ($user->can('chauffeur')) {
            return redirect()->route('chauffeurdashboard.index');
        }

        // aanpassingen om na de login direct door te gaan naar de correcte dashboard

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
}
