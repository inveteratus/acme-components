<?php

namespace Acme\Components;

use Acme\Components\Commands\InstallCommand;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'acme');

        $this->commands(
            new InstallCommand(),
        );
    }

    public function register(): void
    {
        //
    }
}
