<?php

namespace App\Http\Controllers;

use App\Models\busritten;
use Illuminate\Http\Request;
use App\Models\festivals;


class KlantenFestivals extends Controller
{
    public function index(){

        $festivals = festivals::paginate(9);

        return view('klanten.KlantenFestivals', compact('festivals'));
    }

    public function show($festival_id)
    {
        $festivalINFO = festivals::all()->where('festival_id', $festival_id)->first();

        $busritten = busritten::where('festival_id', $festival_id)->where('klant', '!=', 35)->get();


        return view('klanten.klantenFestivalsShow', compact('festivalINFO', 'busritten'));
    }



    // bij de show willen we de festival info hebben een daaronder een for each met de busritten!
    // om die bus dan te boeken, roepen we de busreizen store controller aan, die de data opslaat
    // dan returnen we ook weer terug naar mijn boekingen
}
