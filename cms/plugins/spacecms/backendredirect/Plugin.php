<?php namespace SpaceCMS\BackendRedirect;

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
            'name'        => 'BackendRedirect',
            'description' => 'No description provided yet...',
            'author'      => 'SpaceCMS',
            'icon'        => 'icon-leaf'
        ];
    }
}
