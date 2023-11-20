<?php

namespace Acme\Components\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Symfony\Component\Process\Process;

class InstallCommand extends Command
{
    protected $signature = 'acme:install';
    protected $description = 'Install the acme controllers and routes';

    public function handle(): void
    {
        $this->installDependencies();
        $this->copyFiles();
    }

    private function installDependencies(): void
    {
        $this->info('Installing dependencies ...');

        $packages = [
            'tailwindcss', 'postcss', 'autoprefixer',
            '@tailwindcss/forms',
            '@fontsource/ibm-plex-sans', 'bootstrap-icons',
            'alpinejs', '@alpinejs/persist',
        ];

        $process = new Process(['npm', 'install', '-D'] + $packages);
        $process->run();
    }

    private function copyFiles(): void
    {
        $this->info('Copying files...');

        $fs = new Filesystem();

        $fs->copy(
            __DIR__ . '/../../stubs/postcss.config.js',
            base_path('postcss.config.js')
        );

        $fs->copy(
            __DIR__ . '/../../stubs/tailwind.config.js',
            base_path('tailwind.config.js')
        );

        $fs->copyDirectory(
            __DIR__ . '/../../stubs/app/Http/Controllers',
            base_path('app/Http/Controllers/Acme')
        );

        $fs->copyDirectory(
            __DIR__ . '/../../stubs/resources/css',
            base_path('resources/css/acme')
        );

        $fs->copyDirectory(
            __DIR__ . '/../../stubs/resources/js',
            base_path('resources/js/acme')
        );

        $fs->copyDirectory(
            __DIR__ . '/../../stubs/resources/views',
            base_path('resources/views/acme')
        );

        $fs->copy(
            __DIR__ . '/../../stubs/routes/acme.php',
            base_path('routes/acme.php')
        );
    }
}

