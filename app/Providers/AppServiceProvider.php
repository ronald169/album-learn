<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Auth;

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
        Blade::if('adminOrOwner', function ($id) {
            return Auth::check() && (Auth::id() === $id || Auth::user()->admin);
        });

        Blade::if('admin', function () {
            return Auth::check() && Auth::user()->admin;
        });
    }
}
