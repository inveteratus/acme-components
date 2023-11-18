<?php

namespace Acme\Components;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'acme');
    }

    public function register(): void
    {
        //
    }
}
