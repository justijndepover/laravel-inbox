<?php

namespace Justijndepover\Inbox;

use Illuminate\Mail\Events\MessageSending;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\ServiceProvider;
use Justijndepover\Inbox\Listeners\EmailLogger;

class InboxServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/inbox.php', 'inbox'
        );
    }

    public function boot()
    {
        if (! app()->isProduction()) {
            Event::listen(MessageSending::class, EmailLogger::class);

            $this->publishes([
                __DIR__.'/../config/inbox.php' => config_path('inbox.php'),
            ]);

            $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

            $this->loadRoutesFrom(__DIR__.'/routes.php');

            $this->loadViewsFrom(__DIR__.'/../resources/views', 'laravel-inbox');
        }
    }
}