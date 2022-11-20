<?php namespace AppSpaceWeb\Newsletter;

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
}
