<?php

namespace App\Http\Controllers;

use App\Models\bussen;
use App\Models\chauffeurs;
use App\Models\klant;
use App\Models\planners;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class planningNieuwAccount extends Controller
{
    public function index()
    {
        return view('planning.planningNieuwAccount');
    }

    public function store(request $request)


        // zodra de data binnen is, dan moet er er gecheckt worden of de type 123 is, afhankelijk daarvan wordt er gecheckt in welke  role database hij of zij wordt gezet.
    {

        $rolVanGebruiker = $request->input('type');

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed']
        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $rolVanGebruiker,
        ]);

        switch ($rolVanGebruiker) {
            case 1:
                planners::create([
                    'id' => $user->id
                ]);

                break;
            case 2: $chauffeur =  chauffeurs::create([
                'id' => $user->id
            ]);

//           dd($chauffeur->chauffeur_id);

                    bussen::create([
                        'chauffeur_id' => $chauffeur->chauffeur_id,
                    ]);
                break;


            case 3:
                klant::create([
                    'id' => $user->id,
                    'aantal_punten' => 0
                ]);
                break;
        }

        return redirect('/planning/nieuwaccount');
    }
}
