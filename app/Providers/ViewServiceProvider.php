<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        //
        // Compose a list of Countries
        View::composer(
            'customers.__form',
            'App\Http\View\Composers\CountryComposer'
        );
    }
}
