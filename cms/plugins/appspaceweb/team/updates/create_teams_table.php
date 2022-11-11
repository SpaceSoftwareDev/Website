<?php namespace AppSpaceWeb\Team\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateTeamsTable extends Migration
{
    public function up()
    {
        Schema::create('appspaceweb_team_teams', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->string('name');
            $table->string('stack_string');

            $table->string('portfolio_link');

            $table->smallInteger('sort_order')->default(0);
            $table->boolean('is_published')->default(false);

            $table->timestamps();

        });

    }

    public function down()
    {
        Schema::dropIfExists('appspaceweb_team_teams');
    }
}
