<?php

namespace Acme\Components;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function boot(): void
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'acme');

        $this->publishes([
            __DIR__ . '/../resources/css' => resource_path('css/acme'),
            __DIR__ . '/../resources/js' => resource_path('js/acme'),
            __DIR__ . '/../controllers' => app_path('Http/Controllers/Acme'),
            __DIR__ . '/../routes/acme.php' => base_path('routes'),
        ], 'acme-assets');
    }

    public function register(): void
    {
        //
    }
}
