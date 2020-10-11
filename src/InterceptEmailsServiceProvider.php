<?php

namespace Justijndepover\InterceptEmails;

use Illuminate\Mail\Events\MessageSending;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Justijndepover\InterceptEmails\Listeners\EmailLogger;

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
            Event::listen(MessageSending::class, EmailLogger::class);

            $this->publishes([
                __DIR__.'/../config/mail-interceptor.php' => config_path('mail-interceptor.php'),
            ]);

            $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

            $this->loadRoutesFrom(__DIR__.'/routes.php');
        }
    }
}