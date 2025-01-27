<?php

namespace App\Http\Controllers;

use App\Models\klant;
use App\Models\vipticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\festivals;


class KlantenPunten extends Controller
{
    public function index()
    {
        $userid = Auth::id();

       $klant =  klant::where('id', '=', $userid)->first();

       $festivals = festivals::all();

       $VIPtickets = vipticket::all()->where('klant_id', $klant->klant_id);


        return view('klanten.klantenMijnpunten', compact('klant', 'festivals', 'VIPtickets'));
    }

    public function show($festival_id)
    {

        $userid = Auth::id();

        $klant =  klant::where('id',  $userid)->first();

        $festival = festivals::where('festival_id', $festival_id)->first();

        return view('klanten.klantenMijnpuntenShow', compact('festival', 'klant'));
    }

    public function store(request $request){
        $userid = Auth::id();

        $klantID = klant::where('id', $userid)->first();

        vipticket::create(['klant_id' => $klantID->klant_id, 'festival_id' => $request->festival_id]);

        klant::where('klant_id', $klantID->klant_id)->decrement('aantal_punten', 300);

        return redirect('/klant/mijnritten/punten');

    }

    public function edit($vipticket_id)
    {
        $vipticketinfo = vipticket::all()->where('VIPticketID', $vipticket_id)->first();

        return view('klanten.klantenMijnpuntenEdit', compact('vipticketinfo'));
    }

    public function destroy($VIPticket_id)
    {

        $userid = Auth::id();
        $klantID =  klant::all()->where('id', $userid)->first();

        klant::where('klant_id', $klantID->klant_id)->increment('aantal_punten', 300);


            vipticket::where('VIPticketID', $VIPticket_id)->delete();

            return redirect('/klant/mijnritten/punten');
    }
}
