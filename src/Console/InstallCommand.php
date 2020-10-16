<?php

namespace Justijndepover\Inbox\Console;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    protected $signature = 'inbox:install {--config : publish the configuration file}';

    protected $description = 'Install all of the Laravel Inbox resources';

    public function handle()
    {
        $this->comment('Publishing assets...');

        $this->callSilent('vendor:publish', ['--tag' => 'laravel-inbox-assets']);

        if ($this->option('config')) {
            $this->comment('Publishing configuration...');
            $this->callSilent('vendor:publish', ['--tag' => 'laravel-inbox-config']);
        }

        $this->info('Laravel Inbox installed successfully.');
    }
}