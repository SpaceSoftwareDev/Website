<?php namespace SpaceNotification\MailJetNewsletter;

use System\Classes\PluginBase;

/**
 * MailJetNewsletter Plugin Information File
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
            'name'        => 'MailJetNewsletter',
            'description' => 'No description provided yet...',
            'author'      => 'SpaceNotification',
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
