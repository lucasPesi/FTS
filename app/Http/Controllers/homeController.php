<?php

namespace App\Http\Controllers;



use App\Models\busritten;
use App\Models\festivals;

class homeController extends Controller
{
    public function index(){

        $busritten = busritten::paginate(3);
        $festivals = festivals::paginate(3);


        return view('guest.home', compact('busritten', 'festivals'));
    }
}
