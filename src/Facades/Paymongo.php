<?php

namespace Harlekoy\Paymongo\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Harlekoy\Paymongo\SkeletonClass
 */
class Paymongo extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'paymongo';
    }
}
