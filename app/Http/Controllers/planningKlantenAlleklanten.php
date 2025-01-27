<?php

namespace App\Http\Controllers;


use App\Models\klant;
use App\Models\User;

use Illuminate\Http\Request;

class planningKlantenAlleklanten extends Controller
{
    public function index()
    {
        // note dat als je een user gaat wijzigen ook de user verplaats in de mappen
        // buschauffeur, planning en klanten. is een overkill misschien ooit later
        $klanten = klant::all();
        $usernamen = User::whereIn('id', klant::pluck('id'))->get();
        $names = $usernamen->pluck('name');

        return view('planning.planningKlantenAlleklanten', compact('klanten', 'names'));
    }

    public function edit(Request $request, $id)
    {
        $userinfo = User::where('id', $id)->first();
        $klantinfo = klant::where('id', $id)->first();
        return view('planning.planningKlantenAlleklantenEdit', compact('userinfo', 'klantinfo'));
    }

    public function update(Request $request, $userID)
    {

        $UserKlantenPunten = user::findOrfail($userID);

        $idk = klant::all('id')->where('id', $UserKlantenPunten->id)->first();

        $validate = $request->validate([
            'aantal_punten' => 'required|integer'
        ]);
        $idk->update($validate);

        $validate2 = $request->validate([
            'name' =>  'required|string',
            'email' =>  'required|string'
        ]);

        $UserKlantenPunten->update($validate2);

           return redirect('/planning/klant/alleklanten');

    }

    public function destroy($userID)
    {
        $destroyer = user::findOrFail($userID);
        $destroyer->delete();
        return redirect('/planning/klant/alleklanten');
    }


}



// okay, ik heb ook de usernaam nodig, die staat niet in de table van klant,
// wat er moet gebeuren: select * klanten where id = id
// en return de bijbehorende naam

/* uitleg index functie
 *
 * eerst halen we alle klanten op
 *
 * via de model User, halen wij de ID's op die overeenkomen met de id's van de table klanten
 * doormiddel van tinker te gebruiken dus pluck.
 *
 * Dit is mogelijk omdat wij de relaties hebben gedefineerd in onze models.
 * het resultaat met alle data van de ID's die in de klant table staan, zetten we in een variable die de data bevat.
 *
 * deze noemen we $usernamen, namen zijn niet mijn bsterkste punt.
 *
 * en we willen de 'name' weten dus pluck we de 'name' ervan en doen die in de variable genaamd $names omdat het alle namen
 * bevat die bij de aangeleverde ID's horen. deze maken we compact om door tegeven aan de view
 *
 * in de view wist ik niet hoe ik 2 verschillende datadingen moest doorgeven.
 *
 * een for each loop van 2 datadingen ging helemaal fout. door google kwam ik niet tot een oplossing dus vroeg ik het
 * aan blackbox ai en die gaf mij ($loop->index), dit houdt dus het aantal keer bij dat er geloopt wordt en begint bij 0
 *
 * omdat de eerste for each loop de data van de eerste pakt zal de $names met loop nummer 0 dat ook doen en
 * zorgt voor het gewenste resultaat
 */

