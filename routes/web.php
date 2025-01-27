<?php

use App\Http\Controllers\busreizen;
use App\Http\Controllers\chauffeurdashboard;
use App\Http\Controllers\chauffeurMijnRitten;
use App\Http\Controllers\festivalss;
use App\Http\Controllers\homeController;
use App\Http\Controllers\KlantenBusreizen;
use App\Http\Controllers\KlantenDashboard;
use App\Http\Controllers\KlantenFestivals;
use App\Http\Controllers\KlantenMijnboekingen;
use App\Http\Controllers\KlantenPunten;
use App\Http\Controllers\KlantenReisgeschiedenis;
use App\Http\Controllers\planningBussenAlleritten;
use App\Http\Controllers\planningBussenBusRitten;
use App\Http\Controllers\PlanningDashboard;
use App\Http\Controllers\planningFestivals;
use App\Http\Controllers\planningKlantenAlleklanten;
use App\Http\Controllers\planningKlantenAnalyse;
use App\Http\Controllers\planningNieuwAccount;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('guest.home');
//});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// routes voor alle niet ingelogde users
Route::resource('/', HomeController::class)
    ->only(['index']);
Route::resource('/Busreizen', busreizen::class)
    ->only(['index', 'show']);
Route::resource('/Festival', festivalss::class)
    ->only(['index', 'show']);


// door dat er dezelfde uri is af en toe, je weet wat je bedoelt eventueel later aanpassen met een guest iets in je appserviceproviders

// routes voor planning :

Route::middleware(['can:planning', 'auth'])->group(function () {
    Route::resource('planning/planningdashboard', planningDashboard::class)
        ->only(['index']);

    // er is een probleem dat de dashboard shit verkeerd gaaat. probeer overal van dashboard een dubbel aan te geven

    Route::resource('planning/Festivals', planningFestivals::class)
        ->only(['index', 'show', 'store', 'edit', 'destroy', 'update']);

    Route::resource('planning/bussen/alleritten', planningBussenAlleRitten::class)
        ->only(['index', 'show', 'update']);

    Route::resource('planning/bussen/busritten', planningBussenBusRitten::class)
        ->only(['index']);

    Route::resource('planning/klant/analyse', planningKlantenAnalyse::class)
        ->only(['index']);

    Route::resource('planning/klant/alleklanten', planningKlantenAlleKlanten::class)        // we gaan hier even snel een crud maken
        ->only(['index', 'edit', 'update', 'destroy']);

    Route::resource('planning/nieuwaccount', planningNieuwAccount::class)
        ->only(['index', 'store']);

});


// routes voor de chauffeur:

Route::middleware(['can:chauffeur', 'auth'])->group(function () {
    Route::resource('chauffeur/chauffeurdashboard', chauffeurdashboard::class)
        ->only('index');

    Route::resource('chauffeur/MijnRitten', chauffeurMijnRitten::class)
        ->only('index', 'show');
});


// Routes voor de klant:

Route::middleware(['can:klant', 'auth'])->group(function () {
    Route::resource('klant/klantendashboard', klantendashboard::class)
        ->only('index');

    Route::resource('klant/busreizen', klantenbusreizen::class)
        ->only('index', 'show', 'store');

    Route::resource('klant/mijnritten/reisgeschiedenis', klantenreisgeschiedenis::class)
        ->only('index', 'show');

    Route::resource('klant/mijnritten/mijnboekingen', klantenMijnboekingen::class)
        ->only('index', 'show', 'destroy');

    Route::resource('klant/mijnritten/punten', klantenpunten::class)
        ->only('index', 'show', 'store', 'edit', 'destroy');

    Route::resource('klant/festivalss', klantenfestivals::class)
        ->only('index', 'show');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
Route::middleware('auth')->group(function () {
});



/*
 *
 * okay, als de user in de map festivalss staat, kan hij de info bekijken, dan opent er een scherm met
 * informatie van het festival, en is er nog een mogelijheid om een bus te boeken
 * misschien ook een realtie maken tussen bus en festival dat elk festival sws 1 bus heeft.
 * deze heeft dan de status 0
 * eerst wordt er gecheckt of er een bus is die beschikbaar is of niet, wel ? dan belongs to the festival
 * niet? create a new bus and buschauffeur, deze gaat naar de festivalss info en verschijnt hier,
 *  de user kan deze bus dan boeken
 *
 * Als de user de bus boekt
 *  dan krijgt de kalnt  15 punten,
 *
 * check of the bus voor dat festival  35 menesen heeft.
 * ja?
 *
 *  check if bus is vol ja? doe A
 * else change vol, met busrit id to true and change status to 2 , and doe A
 *
 * A = select new bus, waar beschikbaar = true,  voor festival id, status = 1 and 1 in klanten, vol = false.
 * and turn opvolging van oude busrit_it die vol is into true and  return
 *
 * nee?
 *
 * check if status = 0 if status = 0  then change to 1 and add 1 to klanten create new boekingen
 * else create new boekingen and add 1 to klanten
 *
 * else status = already 1 then add 1 to klanten and create new boekingen
 *
 *
 *
 * BIJ ELK FESTIVAL MOET ER EEN NIEUWE BUSRIT AANGEMAAKT WORDEN MET DE VOLGENDE WAARDES:
 * busrit_id auto
 * festival id van festival
 * bus_id = 0
 * klanten = 0
 * vol = flase
 * status = 0
 * opvolging = false
 * voorbij = false
 *
 */

































