<?php namespace AppSpaceWeb\TeamMember;

use Backend;
use System\Classes\PluginBase;

/**
 * Team Plugin Information File
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
            'name'        => 'Team',
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
            'teammember' => [
                'label'       => 'Team',
                'url'         => Backend::url('appspaceweb/teammember/teammembers'),
                'icon'        => 'icon-user',
                'permissions' => ['appspaceweb.team.*'],
                'order'       => 500
            ],
        ];
    }
}
