<?php

namespace App\Http\Controllers;


use App\Models\boekingen;
use App\Models\busritten;
use Illuminate\Http\Request;

class planningBussenAlleritten extends Controller
{
    public function index(){
        $busritten = busritten::paginate(5);

        return view('planning.planningBussenAlleritten', compact('busritten'));
    }

    public function show($busrit_id)
    {
        $busritINFO = busritten::where('busrit_id', $busrit_id)->first();

        $KlantenInBus = boekingen::where('busrit_id', $busrit_id)->get();

        return view('planning.planningBussenAlleRittenShow', compact( 'busritINFO', 'KlantenInBus'));

    }

    // wat wil ik in de show laten zien?
    // alle busrit info: busrit id, festival id en festival busid, vertrekplaaten etc met aanpassingmogelijkheden.
    //buschauffeur naam
    //  een lijst eronder met wie er allemaal inzit!


//    welke data wil ik zine? bus


    public function update(Request $request, $busrit_id)
    {
        $request->validate([
            'vertrekplaats_datum_tijd1'=> 'nullable|string|max:255',
            'vertrekplaats_datum_tijd2'=> 'nullable|string|max:255',
            'vertrekplaats_datum_tijd3' => 'nullable|string|max:255',
            ]);

        $deBusrit = busritten::findOrFail($busrit_id);

        $deBusrit->update($request->all());

        return redirect('/planning/bussen/alleritten/'.$busrit_id);
    }


}
