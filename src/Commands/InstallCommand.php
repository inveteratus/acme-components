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
        $this->installNodePackages();
        $this->copyConfigStubs();
    }

    private function installNodePackages(): void
    {
        $this->info('Install node packages...');

        $packages = [
            'tailwindcss', 'postcss', 'autoprefixer',
            '@tailwindcss/forms',
            '@fontsource/ibm-plex-sans', 'bootstrap-icons',
            'alpinejs', '@alpinejs/persist',
        ];

        $process = new Process(['npm', 'install', '-D'] + $packages);
        $process->run();
    }

    private function copyConfigStubs(): void
    {
        $this->info('Copying config stubs...');

        $fs = new Filesystem();

        $fs->copy(
            __DIR__ . '/../../stubs/tailwind.config.js',
            base_path('tailwind.config.js')
        );

        $fs->copy(
            __DIR__ . '/../../stubs/postcss.config.js',
            base_path('postcss.config.js')
        );
    }
}
