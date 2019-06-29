<?php

namespace Devfaysal\Muthofun\Facades;

use Illuminate\Support\Facades\Facade;


class Muthofun extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'muthofun';
    }
}