<?php namespace W\Seeder\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use October\Rain\Support\Facades\Schema;

class DropTables extends Command
{
    /**
     * @var string The console command name.
     */
    protected $name = 'w:droptables';

    /**
     * @var string The console command description.
     */
    protected $description = 'Drop all tables';

    /**
     * Execute the console command.
     * @return void
     */
    public function handle()
    {
        if (!config('app.debug')) {
            echo "Dropping tables was paused because app is not running in debug mode";
            return;
        }

        $tables = collect(DB::select('SHOW TABLES'));

        $tables->each(function($table) {
            $tableName = array_values(get_object_vars($table))[0];

            echo "Dropping {$tableName} table\n";
            Schema::drop($tableName);
            $this->info("Table dropped successfully\n");
            echo "--------------------\n";
        });

    }
}
