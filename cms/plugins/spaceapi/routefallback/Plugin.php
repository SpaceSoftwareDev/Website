<?php namespace SpaceApi\RouteFallback;

use System\Classes\PluginBase;

/**
 * RouteFallback Plugin Information File
 */
class Plugin extends PluginBase
{
    /*
     * Dependencies
     */
    public $require = [
        'SpaceApi.ApiException'
    ];

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'RouteFallback',
            'description' => 'No description provided yet...',
            'author'      => 'SpaceApi',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }
}
