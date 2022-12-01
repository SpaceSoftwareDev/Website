<?php namespace Matomos\HideDashboardFromMenu;

use Backend;
use System\Classes\PluginBase;
use October\Rain\Support\Facades\Event;

/**
 * HideDashboardFromMenu Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'HideDashboardFromMenu',
            'description' => 'No description provided yet...',
            'author'      => 'Matomos',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {
        Event::listen('backend.menu.extendItems', function ($navigationManager) {
            $navigationManager->removeMainMenuItem('October.Backend', 'dashboard');
        });
    }
}
