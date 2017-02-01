<?php

namespace Kneipp\LaravelAuthStarter;

use Illuminate\Support\ServiceProvider;

class LaravelAuthStarterServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register('Klaravel\Ntrust\NtrustServiceProvider');

        $this->app['router']->middleware('role', 'Kneipp\LaravelAuthStarter\Http\Middleware\Roles.php');
        $this->app['router']->middleware('permission', 'Kneipp\LaravelAuthStarter\Http\Middleware\Permissions.php');
        $this->app['router']->middleware('ability', 'Kneipp\LaravelAuthStarter\Http\Middleware\Abilities.php');

        // Publishes Migrations
        $this->publishes([
            __DIR__.'/../database/migrations/' => database_path('migrations'),
        ], 'migrations');

        // Publishes Seeds
        $this->publishes([
            __DIR__.'/../database/seeds/' => database_path('seeds'),
        ], 'seeds');

        // Publishes Config
        $this->publishes([
            __DIR__.'/../config/ntrust.php' => config_path('ntrust.php'),
        ], 'config');
    }
}
