<?php

namespace App\Http\Controllers;

use App\Models\busritten;
use App\Models\bussen;
use App\View\Components\chauffeur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\chauffeurs;


class chauffeurMijnRitten extends Controller
{
    public function index(){
        $userid = Auth::id();
        $chauffeur = chauffeurs::where('id',$userid)->first();

        $bus = bussen::all()->where('chauffeur_id',$chauffeur->chauffeur_id)->first();

        $busid = $bus->bus_id;

        $busritten = busritten::where('bus_id',$busid)->get();


                return view('chauffeur.chauffeurMijnRitten', compact('busritten'));
    }

    public function show($busrit_id)
    {
        $busrit = busritten::where('busrit_id', $busrit_id)->first();


         return view('chauffeur.chauffeurMijnRittenShow', compact('busrit'));
    }
}
