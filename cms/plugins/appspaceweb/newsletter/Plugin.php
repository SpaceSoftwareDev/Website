<?php namespace AppSpaceWeb\Newsletter;

use Backend;
use System\Classes\PluginBase;

/**
 * Newsletter Plugin Information File
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
            'name'        => 'Newsletter',
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
        config([
            'services.ses' => [
                'key' => env('SES_KEY'),
                'secret' => env('SES_SECRET'),
                'region' => env('SES_REGION'),
            ]
        ]);
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return [
            'newsletter' => [
                'label'       => 'Newsletter',
                'url'         => Backend::url('appspaceweb/newsletter/newsletters'),
                'icon'        => 'icon-newspaper-o',
                'permissions' => ['appspaceweb.newsletter.*'],
                'order'       => 500,
                'sideMenu'    =>[
                    'newsletter' => [
                        'label'       => 'Newsletter',
                        'url'         => Backend::url('appspaceweb/newsletter/newsletters'),
                        'icon'        => 'icon-envelope-open',
                        'permissions' => ['appspaceweb.newsletter.*'],
                        'order'       => 500,
                    ],
                    'emails' => [
                        'label'       => 'Emails',
                        'url'         => Backend::url('appspaceweb/newsletter/emails'),
                        'icon'        => 'icon-envelope',
                        'permissions' => ['appspaceweb.newsletter.*'],
                        'order'       => 500,
                    ],
                ],
            ],
        ];
    }
}
