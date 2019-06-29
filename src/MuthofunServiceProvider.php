<?php


namespace Devfaysal\Muthofun;

use Illuminate\Support\ServiceProvider;

class MuthofunServiceProvider extends ServiceProvider
{
    /**
    * Bootstrap the application services.
    */

    public function boot()
    {
         if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('muthofun.php'),
            ], 'config');
        }
    }
    
    
    /**
    * Register the application services.
    */

    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'muthofun');
        // Register the main class to use with the facade
        $this->app->singleton('muthofun', function () {
            return new Muthofun;
        });
    }
}