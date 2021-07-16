<?php

namespace Ipimpat\Vuestrap\Console;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use NascentAfrica\Jetstrap\Helpers;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vuestrap:swap {--teams : Indicates if team support should be installed}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Swap Jetstream/Jetstrap inertia views with BootstrapVue based views.";

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->info('Performing swap...');

        // Assets...
        (new Filesystem)->ensureDirectoryExists(resource_path('js'));
        (new Filesystem)->ensureDirectoryExists(resource_path('sass'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/resources/sass', resource_path('sass'));

        // Install Stack...
        $this->swapJetstrapInertiaStack();
    }

    /**
     * Swap the Inertia stack into the application.
     *
     * @return void
     */
    protected function swapJetstrapInertiaStack()
    {
        $this->line('');
        $this->info('Installing BootstrapVue based inertia stack...');

        // Install NPM packages...
        Helpers::updateNodePackages(function ($packages) {

            // Remove no longer needed packages
            $packages = array_diff_key($packages, array_flip([
                '@inertiajs/inertia-vue3', 
                '@vue/compiler-sfc', 
                'tailwindcss', 
                '@tailwindcss/forms', 
                '@tailwindcss/typography']
            ));

            // Swap or add new packages
            return [
                '@inertiajs/inertia' => '^0.9.1',
                '@inertiajs/inertia-vue' => '^0.6.2',
                'bootstrap' => '^4.6.0',
                'bootstrap-vue' => '^2.21.2',
                'vue' => '^2.6.14',
                'vue-loader' => '^15.9.7',
                'vue-template-compiler' => '^2.6.14',
            ] + $packages;
        });

        // Assets...
        copy(__DIR__.'/../../stubs/inertia/resources/js/app.js', resource_path('js/app.js'));

        (new Filesystem)->ensureDirectoryExists(resource_path('js/BootstrapVue'));
        (new Filesystem)->ensureDirectoryExists(resource_path('js/Jetstream'));
        (new Filesystem)->ensureDirectoryExists(resource_path('js/Layouts'));
        (new Filesystem)->ensureDirectoryExists(resource_path('js/Pages'));
        (new Filesystem)->ensureDirectoryExists(resource_path('js/Pages/API'));
        (new Filesystem)->ensureDirectoryExists(resource_path('js/Pages/Auth'));
        (new Filesystem)->ensureDirectoryExists(resource_path('js/Pages/Profile'));

        // Inertia Pages...
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/inertia/resources/js/BootstrapVue', resource_path('js/BootstrapVue'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/inertia/resources/js/Jetstream', resource_path('js/Jetstream'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/inertia/resources/js/Layouts', resource_path('js/Layouts'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/inertia/resources/js/Pages/API', resource_path('js/Pages/API'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/inertia/resources/js/Pages/Auth', resource_path('js/Pages/Auth'));
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/inertia/resources/js/Pages/Profile', resource_path('js/Pages/Profile'));

        (new Filesystem)->delete(resource_path('js/Jetstream/Modal.vue'));

        // Teams...
        if ($this->option('teams')) {
            $this->swapJetstrapInertiaTeamStack();
        }

        $this->line('');
        $this->info('Rounding up...');

        $this->line('');
        $this->info('Vuestrap scaffolding swapped for inertia successfully.');
        $this->comment('Please execute the "npm install && npm run dev" command to build your assets.');
    }

    /**
     * Swap the Inertia team stack into the application.
     *
     * @return void
     */
    protected function swapJetstrapInertiaTeamStack()
    {
        // Directories...
        (new Filesystem)->ensureDirectoryExists(resource_path('js/Pages/Teams'));

        // Pages...
        (new Filesystem)->copyDirectory(__DIR__.'/../../stubs/inertia/resources/js/Pages/Teams', resource_path('js/Pages/Teams'));
    }
}
