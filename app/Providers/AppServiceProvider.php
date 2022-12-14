<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }
    }


    public function boot()
    {
        Gate::define('isAdmin', function ($user) {
            return $user->role == "admin";
        });
        Gate::define('isClient', function ($user) {
            return $user->role == "client";
        });
        Gate::define('isPetugas', function ($user) {
            return $user->role == "petugas";
        });
    }
}
