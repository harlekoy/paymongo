<?php

namespace Harlekoy\Paymongo;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Harlekoy\Paymongo\SkeletonClass
 */
class SkeletonFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'skeleton';
    }
}
