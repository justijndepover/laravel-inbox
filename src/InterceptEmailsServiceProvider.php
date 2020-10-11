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
        $this->publishes([
            __DIR__.'/../config/mail-interceptor.php' => config_path('mail-interceptor.php'),
        ]);
    }
}