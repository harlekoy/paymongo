<?php

namespace Harlekoy\Paymongo;

use Harlekoy\Paymongo\Middlewares\PaymongoValidateSignature;
use Harlekoy\Paymongo\Paymongo;
use Harlekoy\Paymongo\Signer\Signer;
use Illuminate\Support\ServiceProvider;

class PaymongoServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('paymongo.php'),
            ], 'config');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'paymongo');

        $this->app->singleton('paymongo', function ($app) {
            return new Paymongo;
        });

        $this->app->bind(Signer::class, config('paymongo.signer'));

        $this->app['router']->aliasMiddleware('paymongo.signature', PaymongoValidateSignature::class);
    }
}
