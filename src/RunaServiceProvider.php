<?php

namespace ClaraLeigh\RunaApi;

use Illuminate\Support\ServiceProvider;

class RunaServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/runa-api.php' => config_path('runa-api.php'),
        ], 'runa-api');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/config/runa_connect_api.php', 'runa-api');

        $this->app->singleton(RunaConnectApi::class, function ($app) {
            return new RunaConnectApi($app['config']['runa-api']);
        });
    }
}

