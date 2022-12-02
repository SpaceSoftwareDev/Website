<?php namespace W\Importer;

use Backend\Facades\Backend;
use System\Classes\PluginBase;

/**
 * Importer Plugin Information File
 */
class Plugin extends PluginBase
{
    public $require = 'W.Seeder';

    public function pluginDetails()
    {
        return [
            'name'        => 'Importer',
            'description' => 'Imports data from CSV file',
            'author'      => 'W',
            'icon'        => 'icon-list'
        ];
    }


    public function registerNavigation()
    {
        return [
            'importer'  => [
                'label' => 'Import',
                'url'   => Backend::url('w/importer/import'),
                'icon'  => 'icon-list'
            ],
        ];
    }
}
