<?php

namespace App\Http\Controllers;

use App\Models\boekingen;
use App\Models\busritten;
use App\Models\bussen;
use App\Models\klant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KlantenMijnboekingen extends Controller
{
    public function index()
    {
        $userid = Auth::id();
        $klantInfo = klant::where('id', $userid)->first();
        $boekingVanKlant = boekingen::where('klant_id', $klantInfo->klant_id)->get();
        return view('klanten.KlantenMijnboekingen', compact('boekingVanKlant'));


    }

    public function show($boekingId)
    {


        $deboeking = boekingen::where('boeking_id', $boekingId)->first();

        $busritINFO = busritten::where('busrit_id', $deboeking->busrit_id)->first();

        return view('klanten.klantenMijnboekingenShow', compact('deboeking', 'busritINFO'));
    }

    public function destroy($boekingId)
    {

        $boekingBusritInfo = boekingen::where('boeking_id', $boekingId)->first();

        $busritDieJeWil = busritten::where('busrit_id', $boekingBusritInfo->busrit_id)->first();

        $aantalKlantenVanBusrit = $busritDieJeWil->klant;

        $festivalID = $boekingBusritInfo->festival_id;

        $userid = Auth::id();

        $klant = klant::where('id', $userid)->first()->decrement('aantal_punten', 30); // als de busrit geannuleerd wordt dan halen we 30 punten weg


        switch ($aantalKlantenVanBusrit) {
            case 35;

                $aanpassendeBusrit = busritten::where('festival_id', $festivalID)->where('klant', 0)->first(); // dit is de busrit, die automatisch aangemaakt werd bij 35, deze moet gevonden worden en worden aangepast.

                $busritVerwijderID = $aanpassendeBusrit->busrit_id; // daar pakken we het ID  van, dit is alleen mogelijk als er dus

                $busID = $aanpassendeBusrit->bus_id;

                busritten::where('busrit_id', $boekingBusritInfo->busrit_id)->decrement('klant', 1, [
                    'vol' => false,
                    'status' => 1,
                ]);

                busritten::where('busrit_id', $busritVerwijderID)->delete();

                bussen::where('bus_id', $busID)->update(['beschikbaar' => true]);

                boekingen::where('boeking_id', $boekingId)->delete();


                break;
            // in  het geval dat de geannuleerde boeking, een busrit heeft met al 35 mensen erin dus dan wordt, de automatisch aangemaakte nieuwe busrit, verwijderd en de variableen in de database ook weer normaal.
            // zo staan de waardes weer op hoe ze horen te zijn en als er dan een nieuwe aanmelding is dan wordt dat de 35ste en gaat het weer verder zoals het hoort.


            case 1;

            busritten::where('busrit_id', $busritDieJeWil->busrit_id)->decrement('klant',  1, ['status' => 0]);

                boekingen::where('boeking_id', $boekingId)->delete();

                break;


                default;

                busritten::where('busrit_id', $busritDieJeWil->busrit_id)->decrement('klant', 1);
                    boekingen::where('boeking_id', $boekingId)->delete();

                break;
        }
        // eigenlijk moet ik dan ook de een punten van de klant weer terug draaien maar dat voor een andere keer.


        return redirect('/klant/mijnritten/mijnboekingen');
    }

}
// als de klant een busrit annuleerd en is nummer 35 dan: -1, verander vol = false, status into 1. if busrit with festival ID = $4 table klant is = to 0 then delete the busrit. and change status opvolging into false.
//  else  return.

// als de klant een busrit annuleerd en is nummer 1 dan: get busrit id, change klant -1 and status 0

// else als beide scenarios er niet zijn: -1 bij klant bij dat gegeven busrit id.
