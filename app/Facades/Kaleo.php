<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class Kaleo extends Facade
{
    /**
     * {@inheritDoc}
     */
    public static function getFacadeAccessor()
    {
        return 'kaleo';
    }
}
