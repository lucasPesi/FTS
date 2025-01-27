<?php

namespace App\Http\Controllers;

use App\Models\boekingen;
use App\Models\klant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KlantenReisgeschiedenis extends Controller
{
    public function index()
    {
        $userid = Auth::id();
        $klant = klant::all()->where('id', $userid)->first();

        $boekingen = boekingen::where('klant_id', $klant->klant_id)->get();
        return view('klanten.klantenreisgeschiedenis', compact('boekingen'));
    }

    public function show($boeking_id)
    {

            $boekingINFO = boekingen::all()->where('boeking_id', $boeking_id)->first();

            return view('klanten.klantenReisgeschiedenisShow', compact('boekingINFO'));
    }


    // wat willen we doen, we willen de festivals van de boekingen hebben en de boeking zelf.
}
