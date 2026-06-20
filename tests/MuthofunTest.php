<?php

namespace Devfaysal\Muthofun\Tests;

use Devfaysal\Muthofun\Muthofun;
use Devfaysal\Muthofun\MuthofunServiceProvider;
use Orchestra\Testbench\TestCase;

class MuthofunTest extends TestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            MuthofunServiceProvider::class,
        ];
    }

    protected function defineEnvironment($app): void
    {
        $app['config']->set('muthofun.apiKey', 'test-api-key');
    }

    public function test_it_registers_the_muthofun_service(): void
    {
        $this->assertInstanceOf(Muthofun::class, $this->app->make('muthofun'));
    }
}
