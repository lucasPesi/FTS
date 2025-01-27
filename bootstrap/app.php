<?php


use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {


        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();




// nu hebben we de middleware  gedefineerd en kan de method in de class welkerolmiddleware aangeroepen worden.
// elke keer als er nu een request komt, maakt niet uit wat, dan wordt, indien de middleware geregistreerd staat in
// de web, dan wordt deze uitgevoerd voordat die toegang geeft.
