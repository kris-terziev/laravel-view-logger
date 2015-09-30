<?php

namespace Kris\LaravelViewCounter;

use Illuminate\Support\ServiceProvider;

class LaravelViewCounterServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        //Publishes the config file to the app's config directory.
        $this->publishes([
            __DIR__.'../config/config.php' => config_path('view_counter.php'),
        ]);


        //Publishes the migrations to the app's migrations directory.
        $this->publishes([
            __DIR__.'/migrations' => database_path('migrations')
        ], 'migrations');
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}