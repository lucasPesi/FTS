<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Gate::define('planning', function ($user) {
            if ($user->role_id === 1) {
                return true;

            } else {
                return false;
            }
        });

        Gate::define('chauffeur', function ($user) {
            if ($user->role_id === 2) {
                return true;

            } else {
                return false;
            }
        });

        Gate::define('klant', function ($user) {
            if ($user->role_id === 3) {
                return true;

            } else {
                return false;
            }
        });
    }
}
