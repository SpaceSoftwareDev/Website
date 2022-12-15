<?php namespace SpaceApi\CORS;

use System\Classes\PluginBase;
use SpaceApi\CORS\Classes\HandleCORS;

/**
 * CORS Plugin Information File
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
            'name'        => 'CORS',
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
        $this->app['Illuminate\Contracts\Http\Kernel']
            ->prependMiddleware(HandleCORS::class);
    }
}
