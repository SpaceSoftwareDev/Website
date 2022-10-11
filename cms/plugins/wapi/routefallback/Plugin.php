<?php namespace WApi\RouteFallback;

use System\Classes\PluginBase;

/**
 * RouteFallback Plugin Information File
 */
class Plugin extends PluginBase
{
    public $require = [
        'WApi.ApiException'
    ];

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name' => 'RouteFallback',
            'description' => 'No description provided yet...',
            'author' => 'W',
            'icon' => 'icon-leaf'
        ];
    }
}
