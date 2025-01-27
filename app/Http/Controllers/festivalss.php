<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\festivals;

class festivalss extends Controller
{
    public function index()
    {
       $festivals = festivals::paginate(9);

        return view('guest.festivals', compact('festivals'));
    }

    public function show($festival_id)
    {
        $festival =  festivals::findOrfail($festival_id);

        return view('guest.festivalsShow', compact('festival'));
    }
}
