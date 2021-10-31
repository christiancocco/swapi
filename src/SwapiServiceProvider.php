<?php

namespace ChristianCocco\Swapi;

use Illuminate\Support\ServiceProvider;
use ChristianCocco\Swapi\Console\InstallSwapiCommand;
use ChristianCocco\Swapi\Console\InitSwapiCommand;

class SwapiServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('ChristianCocco\Swapi\Http\Controllers\SwapiController');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //Load Routes
        $this->loadRoutesFrom(__DIR__ . '/routes/routes.php');
        $this->loadRoutesFrom(__DIR__ . '/routes/api.php');

        // Register the command if we are using the application via the CLI
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallSwapiCommand::class,
                InitSwapiCommand::class,
            ]);
        }
        //Publish configuration file
        $this->publishes([
            __DIR__.'/config/swapipackage.php' => config_path('swapipackage.php')
        ], 'swapi-config');

        //Load Migration
        $this->loadMigrationsFrom(__DIR__.'/storage/migrations');
    }
}
