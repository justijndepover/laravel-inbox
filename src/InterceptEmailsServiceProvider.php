<?php

namespace Justijndepover\InterceptEmails;

use Illuminate\Support\ServiceProvider;

class InterceptEmailsServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/mail-interceptor.php', 'mail-interceptor'
        );
    }

    public function boot()
    {
        if (! app()->isProduction()) {
            $this->publishes([
                __DIR__.'/../config/mail-interceptor.php' => config_path('mail-interceptor.php'),
            ]);

            $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

            $this->loadRoutesFrom(__DIR__.'/routes.php');
        }
    }
}