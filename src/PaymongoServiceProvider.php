<?php

namespace Harlekoy\Paymongo;

use Harlekoy\Paymongo\Paymongo;
use Illuminate\Support\ServiceProvider;

class PaymongoServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            // $this->publishes([
            //     __DIR__.'/../config/config.php' => config_path('paymo.php'),
            // ], 'config');

            /*
            $this->loadViewsFrom(__DIR__.'/../resources/views', 'skeleton');

            $this->publishes([
                __DIR__.'/../resources/views' => base_path('resources/views/vendor/skeleton'),
            ], 'views');
            */
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->singleton('paymongo', function ($app) {
            return new Paymongo;
        });
    }
}
