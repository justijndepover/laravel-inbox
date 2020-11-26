<?php

namespace Justijndepover\Inbox;

use Illuminate\Mail\Events\MessageSending;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Justijndepover\Inbox\Console\InstallCommand;
use Justijndepover\Inbox\Listeners\EmailLogger;

class InboxServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/inbox.php', 'inbox');

        $this->commands(InstallCommand::class);
    }

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/inbox.php' => config_path('inbox.php'),
            ], 'laravel-inbox-config');

            $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');

            $this->publishes([
                __DIR__ . '/../public' => public_path('vendor/laravel-inbox'),
            ], 'laravel-inbox-assets');
        }

        if (config('inbox.listener_enabled') == true) {
            Event::listen(MessageSending::class, EmailLogger::class);
        }

        if (config('inbox.application_enabled') == true) {
            $this->loadRoutesFrom(__DIR__ . '/routes.php');

            $this->loadViewsFrom(__DIR__ . '/../resources/views', 'laravel-inbox');

            $this->registerViewInboxGate();
        }
    }

    private function registerViewInboxGate()
    {
        Gate::define('viewInbox', function ($user = null) {
            return !app()->isProduction();
        });
    }
}
