<?php

namespace ClaraLeigh\RunaApi;

use ClaraLeigh\RunaApi\Support\RunaApi;
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
        $this->mergeConfigFrom(__DIR__.'/config/runa-api.php', 'runa-api');

        $this->app->singleton(RunaApi::class, function ($app) {
            return new RunaApi(
                endpoint: $app['config']['runa-api.endpoint'],
                username: $app['config']['runa-api.username'],
                password: $app['config']['runa-api.password']
            );
        });
    }
}

