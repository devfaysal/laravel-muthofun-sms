<?php

namespace Devfaysal\Muthofun;

use Illuminate\Support\Facades\Facade;


class MuthofunFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'Muthofun';
    }
}