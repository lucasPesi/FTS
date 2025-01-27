<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\controller;
use App\Models\klant;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 3
        ]);

        $inKlant = Klant::create([
            'id' => $user->id,
            'aantal_punten' => 0
        ]);

        event(new Registered($user));
         // hier zorgen we ervoor dat als er een user aangemaakt wordt dat hij/zij automatisch ook in de klant tbale komt
        // de Klant class wordt aangeroepen en de geaccepteerde data is erbij vermeldt

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
