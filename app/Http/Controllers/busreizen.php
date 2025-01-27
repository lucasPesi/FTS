<?php

namespace App\Http\Controllers;

use App\Models\busritten;

class busreizen extends Controller
{
    public function index()
    {

        $busritten = busritten::all();

        return view('guest.busreizen', compact('busritten'));
    }

    public function show($busrit_id)
    {
        $deBusrit = busritten::findOrFail($busrit_id);

        return view('guest.busreizenShow', compact('deBusrit'));
    }
}
