<?php namespace W\Seeder\Facades;

use Illuminate\Support\Facades\Facade;

class SeederProviders extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     *
     * @throws \RuntimeException
     */
    protected static function getFacadeAccessor()
    {
        return 'w.seeder.providers';
    }
}
