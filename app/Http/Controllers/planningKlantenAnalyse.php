<?php

namespace App\Http\Controllers;


use App\Models\busritten;
use App\Models\bussen;
use App\Models\klant;
use App\Models\User;

class planningKlantenAnalyse extends Controller
{
    public function index(){

        $werknemers = User::where('role_id', 1)->orwhere('role_id', 2)->count();
        $bussen = bussen::all()->count();
        $klanten = klant::all()->count();
        $busritten = busritten::all()->count();

        return view('planning.planningKlantenAnalyse', compact('werknemers', 'bussen', 'klanten', 'busritten'));
    }
}
