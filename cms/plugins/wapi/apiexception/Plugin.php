<?php namespace WApi\ApiException;

use Backend;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function pluginDetails()
    {
        return [
            'name'        => 'ApiException',
            'description' => 'No description provided yet...',
            'author'      => 'Wezeo',
            'icon'        => 'icon-leaf'
        ];
    }
}
