<?php namespace SpacePub\ContactForm;

use Backend\Facades\Backend;
use System\Classes\PluginBase;

/**
 * ContactForm Plugin Information File
 */
class Plugin extends PluginBase
{
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
            'name'        => 'ContactForm',
            'description' => 'No description provided yet...',
            'author'      => 'SpacePub',
            'icon'        => 'icon-envelope-o'
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
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return [
            'spacepub.contactform.access_contactforms' => [
                'tab'   => 'ContactForm',
                'label' => 'Allow to access Contact Forms'
            ]
        ];
    }

    public function registerSettings()
    {
        return [
            'contactform' => [
                'label'       => 'Contact Forms',
                'description' => 'Messages from contact forms.',
                'category'    => env('APP_NAME'),
                'icon'        => 'icon-envelope-o',
                'url'         => Backend::url('spacepub/contactform/contactforms'),
                'order'       => 400,
                'keywords'    => 'contact message form',
                'permissions' => ['spacepub.contactform.access_contactforms']
            ]
        ];
    }
}
