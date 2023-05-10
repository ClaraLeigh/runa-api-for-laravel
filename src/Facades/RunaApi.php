<?php

namespace ClaraLeigh\RunaApi\Facades;

use Illuminate\Support\Facades\Facade;

class RunaApi extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return \ClaraLeigh\RunaApi\Support\RunaApi::class;
    }
}
