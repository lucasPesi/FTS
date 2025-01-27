<?php

namespace App\Http\Controllers;

use App\Models\busritten;
use App\Models\bussen;
use App\Models\chauffeurs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class chauffeurdashboard extends Controller
{
    public function index(){

        $userid = Auth::id();
        $chauffeur = chauffeurs::where('id',$userid)->first();
        $bus = bussen::all()->where('chauffeur_id',$chauffeur->chauffeur_id)->first();
        $busid = $bus->bus_id;

        $busritten = busritten::where('bus_id',$busid)->get();

        return view('chauffeur.chauffeurdashboard', compact('busritten'));
    }
}
