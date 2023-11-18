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
        $this->createTailwindConfig();
        $this->createPostcssConfig();

    }

    private function installNodePackages(): void
    {
        $packages = [
            'tailwindcss', 'postcss', 'autoprefixer',
            '@tailwindcss/forms',
            '@fontsource/ibm-plex-sans', 'bootstrap-icons',
            'alpinejs', '@alpinejs/persist',
        ];

        $process = new Process(['npm', 'install', '-D'] + $packages);
        $process->run();
    }

    private function createTailwindConfig(): void
    {
        (new Filesystem())->copy(
            __DIR__ . '/../../stubs/tailwind.config.js',
            base_path('tailwind.config.js')
        );
    }

    private function createPostcssConfig(): void
    {
        (new Filesystem())->copy(
            __DIR__ . '/../../stubs/postcss.config.js',
            base_path('postcss.config.js')
        );
    }
}
