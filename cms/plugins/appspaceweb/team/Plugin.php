<?php namespace AppSpaceWeb\Team;

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
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {

        return [
            'team' => [
                'label'       => 'Team',
                'url'         => Backend::url('appspaceweb/team/teams'),
                'icon'        => 'icon-leaf',
                'permissions' => ['appspaceweb.team.*'],
                'order'       => 500,
            ],
        ];
    }

    public function boot()
    {

    }
}
