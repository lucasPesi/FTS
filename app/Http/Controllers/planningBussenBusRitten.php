<?php

namespace App\Http\Controllers;


use App\Models\busritten;

class planningBussenBusRitten extends Controller
{
    public function index(){

        $busritten =  busritten::all();
        return view('planning.planningBussenBusRitten', compact('busritten'));
    }
}
