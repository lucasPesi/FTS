<?php

namespace App\Http\Controllers;


use App\Models\busritten;
use App\Models\bussen;
use Illuminate\Http\Request;


use App\Models\festivals;
use Illuminate\Support\Facades\DB;


class planningFestivals extends Controller
{
    public function index()
    {
        $alleFestivals = festivals::all();
        return view('planning.planningFestivals', compact('alleFestivals'));
    }


    public function show($festival_id)
    {
        $hetFestival = festivals::findOrFail($festival_id);
//        dd($hetFestival);
        return view('planning.planningFestivalsShow', compact('hetFestival'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'festival_naam' => 'required|string|max:255',
            'festival_locatie' => 'required|string|max:255',
            'festival_datum' => 'required|date'
        ]);

        $newFestivalID =    festivals::create($validate);
        $theBus = DB::table('bussen')->where('beschikbaar', true)->first()->bus_id;

        DB::table('bussen')->where('bus_id', $theBus)->update(['beschikbaar' => false]);

        $benodigdeData = [
            'festival_id' => $newFestivalID->festival_id,
            'bus_id' => $theBus,
        ];


        busritten::create($benodigdeData);

//        nieuw festival, select bus a bus with beschikbaar = 1, get that id, change beschikbaar into 0
//        create new busritten: busrit_id = auto, festivalID just created, bus_id from the beschikbare bus,    vertrekplaats, datum en tijd, onbekend voor nu, klanten = 0, vol = false, status = 0, opvolging = false voorbij = false

        // het is wel zo dat er genoeg chauffeurs moeten zijn, anders moet er een controle worden gemaakt.

        return redirect('/planning/Festivals');
    }

    public function edit(Request $request, $festival_id)
    {

        $hetFestival = festivals::findOrFail($festival_id);

        return view('planning.planningFestivalEdit', compact('hetFestival'));
    }

    public function update(Request $request, $festival_id)
    {
        $festival = festivals::findOrFail($festival_id);
        $validate = $request->validate([
            'festival_naam' => 'required|string|max:255',
            'festival_locatie' => 'required|string|max:255',
            'festival_datum' => 'required|date'
        ]);

        $festival->update($validate);

        return redirect('/planning/Festivals');

    }

    public function destroy($festival_id)
    {
        festivals::all()->find($festival_id)->delete();
        return redirect('/planning/Festivals');

        // probleem ontdekt op 26-01, als er een festival verwijderd wordt, wordt de busrit en boekingen tables niet aangegepast dit moet later nog worden gedaan indien tijd. Dit kan opgelost worden door dit toe teg voegen in de funcite
        // sekect all from boekingen where bus id, f$festival id is  dan destroy. hetzelfde voor de busritten.  dit probleem zorgt ervoor dat het null is want je kan niets ophalen van iets dat nergens aan gelinkt.
    }
}
