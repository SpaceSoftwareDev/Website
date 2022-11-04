<?php namespace WCms\BackendRedirect;

use System\Classes\PluginBase;

/**
 * BackendRedirect Plugin Information File
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
            'name' => 'BackendRedirect',
            'description' => 'No description provided yet...',
            'author' => 'WCms',
            'icon' => 'icon-leaf'
        ];
    }
}
