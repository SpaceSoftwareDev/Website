<?php namespace W\Seeder;

use W\Seeder\Console\Seed;
use System\Classes\PluginBase;
use W\Seeder\Classes\Providers;
use W\Seeder\Console\DropTables;
use Illuminate\Support\Facades\App;
use W\Seeder\Facades\SeederProviders;

/**
 * seeder Plugin Information File
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
            'name'        => 'Seeder',
            'description' => 'Seed models from data source.',
            'author'      => 'W',
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
        $this->registerConsoleCommand('w.seed', Seed::class);
        $this->registerConsoleCommand('w.droptables', DropTables::class);

        App::singleton('w.seeder.providers', function () {
            return new Providers();
        });

        SeederProviders::add([
            Providers\JsonProvider::class
        ]);
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
