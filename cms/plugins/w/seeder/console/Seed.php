<?php namespace W\Seeder\Console;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use System\Classes\PluginManager;
use W\Seeder\Classes\Seeder;

class Seed extends Command
{
    /**
     * @var string The console command name.
     */
    protected $name = 'w:seed';

    /**
     * @var string The console command description.
     */
    protected $description = 'No description provided yet...';

    /**
     * Execute the console command.
     * @return void
     */
    public function handle()
    {
        // Get all vendors in plugins folder and unset '.' , '..'
        $vendors = scandir(plugins_path());
        unset($vendors[0]);
        unset($vendors[1]);

        // Get all plugins from all vendors
        $plugins = [];
        foreach ($vendors as $vendor) {
            if (!is_dir(plugins_path($vendor))) {
                continue;
            }
            $plugins[$vendor] = scandir(plugins_path($vendor));
            unset($plugins[$vendor][0]);
            unset($plugins[$vendor][1]);
        }

        // Get all namespaces from vendors
        $namespaces = [];
        $i = 0;
        foreach ($plugins as $vendor => $plugin) {
            foreach ($plugin as $value) {
                $namespaces[$i] = $vendor . '.' . $value;
                $i++;
            }
        }

        // Get only active plugins
        $activeNamespaces = [];
        $i = 0;
        foreach ($namespaces as $namespace) {
            $pluginData = PluginManager::instance();
            $isExist = $pluginData->exists($namespace);
            if ($isExist) {
                array_push($activeNamespaces, $namespace);
            }
        }

        // Get seed data (json and name)
        $seedFolders = [];
        foreach ($activeNamespaces as $activeNamespace) {
            $folderName = explode('.', $activeNamespace);
            $folderName = implode('/', $folderName);
            $pluginFolder = plugins_path($folderName);
            $folder = $this->argument('folder') . '/';

            if (!$this->argument('folder')) {
                $folder = '';
            }

            $folderToSeed = $pluginFolder . '/seeds/' . $folder;

            if (is_dir($folderToSeed)) {
                $seedFiles = scandir($folderToSeed);
                unset($seedFiles[0]);
                unset($seedFiles[1]);

                //Get model to seed
                foreach ($seedFiles as $seedFile) {
                    if (substr($seedFile, -5,5) != '.json') {
                        continue;
                    }

                    $modelName = explode('_', $seedFile);
                    unset($modelName[0]);

                    $modelName = implode('\\', $modelName);
                    $modelName = str_replace('.json', '', $modelName);


                    Seeder::seed($modelName, $folderToSeed . $seedFile);
                    $this->info('Successfully seeded model: ' . $modelName);
                }
            }
        }
    }

    /**
     * Get the console command arguments.
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['folder', InputArgument::OPTIONAL, 'Seeds from subfolder etc. /seeds/demo'],
        ];
    }

    /**
     * Get the console command options.
     * @return array
     */
    protected function getOptions()
    {
        return [];
    }
}
