<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;


class ComposerServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(
            'layouts.sidebar', 'App\Http\ViewComposers\MenuComposer'
        );
        view()->composer(
            'welcome', 'App\Http\ViewComposers\ProfileComposer'
        );
        view()->composer(
            'layouts.app', 'App\Http\ViewComposers\AppComposer'
        );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

    }

}
