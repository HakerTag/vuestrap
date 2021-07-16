<?php

namespace Ipimpat\Vuestrap\Tests;

use Ipimpat\Vuestrap\JetstrapFacade;

class InstallCommandTest extends TestCase
{

    /** @test */
    public function inertia_swapped()
    {
        // Run the make command
        $this->artisan('vuestrap:swap')
            ->expectsOutput('Vuestrap scaffolding swapped for inertia successfully.')
            ->expectsOutput('Please execute the "npm install && npm run dev" command to build your assets.')
            ->assertExitCode(0);

        $this->basicTests();
        $this->basicInertiaTests();
    }

    /** @test */
    public function inertia_swapped_teams()
    {
        // Run the make command
        $this->artisan('vuestrap:swap --teams')
            ->expectsOutput('Vuestrap scaffolding swapped for inertia successfully.')
            ->expectsOutput('Please execute the "npm install && npm run dev" command to build your assets.')
            ->assertExitCode(0);

        $this->basicTests();
        $this->basicInertiaTests();
        $this->inertiaTeamTests();
    }
}
