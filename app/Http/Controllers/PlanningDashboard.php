<?php

namespace App\Http\Controllers;


use App\Models\busritten;

class PlanningDashboard extends Controller
{
    public function index()
    {

        $todos = busritten::whereNull('vertrekplaats_datum_tijd3')->orWhere('vertrekplaats_datum_tijd3', '')->get();


        return view('planning.planningDashboard', compact('todos'));
    }
}
