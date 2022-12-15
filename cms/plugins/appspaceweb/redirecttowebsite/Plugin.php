<?php namespace AppSpaceWeb\RedirectToWebsite;

use System\Classes\PluginBase;

/**
 * RedirectToWebsite Plugin Information File
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
            'name'        => 'RedirectToWebsite',
            'description' => 'No description provided yet...',
            'author'      => 'AppSpaceWeb',
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

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return [
            'redirecttowebsite' => [
                'label'       => 'Website',
                'url'         => 'https://space-software.com/',
                'icon'        => 'icon-desktop',
                'permissions' => ['appspaceweb.redirecttowebsite.*'],
                'order'       => 100
            ]
        ];
    }
}
