<?php

namespace App\Http\Controllers;

use App\Models\boekingen;
use App\Models\busritten;
use App\Models\bussen;
use App\Models\festivals;

use App\Models\klant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KlantenBusreizen extends Controller
{
    public function index()
    {

        $busritten = busritten::all();

        return view('klanten.klantenbusreizen', compact('busritten'));

        // eerst werkte het niet, om de naam van het festival op te halen dat niet in de busritten table staat, maar wel
        // een foreign key, in de model van busritten moest de foreign key nog benadrukt worden.
    }

    public function show($busrit)
    {

        $deBusrit = busritten::findOrFail($busrit);

             return  view('klanten.klantenbusreizenShow', compact( 'deBusrit'));

    }
    public function store(Request $request)
    {
//        dd($request);
        $userid = Auth::id();
        $klantInfo = klant::where('id', $userid)->get();
        $klantID = $klantInfo[0]->klant_id;

        $festival_id = $request->festival_id;
        $busrit_id = $request->busrit_id;


        $data = [
            'festival_id' => $festival_id,
            'klant_id' => $klantID,
            'busrit_id' => $busrit_id,
        ];


        $geboekteBusrit = busritten::where('busrit_id', $busrit_id)->where('vol', false)->first();



        switch ($geboekteBusrit->klant){
            case 34;
                boekingen::create($data);

                busritten::where ('busrit_id', $busrit_id)->increment('klant', 1, [
                    'vol' => true,
                    'status' => 2
                    ]);

                klant::where ('klant_id', $klantID)->increment('aantal_punten', 30);

                $buzzID = bussen::where('beschikbaar', true)->first()->bus_id;
                bussen::where('bus_id', $buzzID)->update(['beschikbaar' => false]);

                $nieuweBusritInfo = [
                    'festival_id' => $festival_id,
                    'bus_id' => $buzzID
                ];

                busritten::create($nieuweBusritInfo);

                busritten::where('busrit_id', $busrit_id)->update(['opvolging' => true]);

                break;

                case null;

                    boekingen::create($data);

                    klant::where ('klant_id', $klantID)->increment('aantal_punten', 30);

                    busritten::where('busrit_id', $busrit_id)->increment('klant', 1, ['status' => 1]);

                    break;

                    default:
                        boekingen::create($data);

                        klant::where ('klant_id', $klantID)->increment('aantal_punten', 30);

                        busritten::where('busrit_id', $busrit_id)->increment('klant', 1);

        }

          return redirect('/klant/mijnritten/mijnboekingen');

        // headsup, maak de boek nu button hide of unhide,  if vol= true hide button
        // op deze manier kan de functie hieronder altijd werken!

        // select busrit where busrit_id = $5 and vol = false,


        // select busrit where busritID = $5 and vol = false {
    //      if klant = 34 then add festival_id, klantID en busrit ID into boekingen

        // change, vol = true, status into 3 en add 1 to klant dus wordt het 35
        //
        // add 30 npunten bij klant.
        // make new busrit, dus selecteer bus met bschikbaar true,
        // get that busID, get festival ID, klant = 0, vol = false, status = 0
        // and oude busrit verander opvolging in false.

        // nu heeft de gebruiker een boekingen gedaan, zijn de statussen in de busritten table.
        // aangepast naar hoe ze horen te zijn. als de bus 35 mensen heeft
        // en wordt er een niewe bus toegewezen aan het festival.
        // de volgende keer als er een boeking is selecteren we de een andere busrit where met aangeklikte busrit en vol = false.
        // dat is de net aangemaakte bus.

        //if

        // klant = 0 then insert into boekingen: festival ID, Klant id en busrit ID
        // add 30 punten bij de klant.
        // add 1 bij klant in table busritten
        // add 1 to status

        // else{
        // insert into boekingen: festival_id, klant_id en busrit_id
        // add 30 punten bij de klant.
        // add +1 bij klant in de table busritten where busrit id = busrit id .
        //
        // de zal het vaakst worden gebruikt.




    }

}
//} // ik wil de data van het festival ophalen waar de festival id overeenkomt met het festivalid van de busrit
