<?php

namespace App\Http\Controllers;

use App\Models\boekingen;
use App\Models\klant;
use App\Models\vipticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KlantenDashboard extends Controller
{
    public function index()
    {

        $userid = Auth::id();

        $klantInfo = klant::where('id', $userid)->first();

        $boekingen = boekingen::where('klant_id', $klantInfo->klant_id)->paginate(3, ['*'], 'boekingen');
        $viptickets = vipticket::where('klant_id', $klantInfo->klant_id)->paginate(2, ['*'], 'viptickets');

        return view('klanten.klantenDashboard', compact('boekingen', 'klantInfo', 'viptickets'));
    }
}
