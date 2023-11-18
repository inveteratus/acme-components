<?php

namespace Acme\Components;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'acme');

        $this->publishes([
            __DIR__ . '/../resources/js/acme' => resource_path('views/js/acme')
        ]);
    }

    public function register(): void
    {
        //
    }
}
