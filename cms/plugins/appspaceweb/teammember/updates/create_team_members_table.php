<?php namespace AppSpaceWeb\Team\Updates;

use October\Rain\Support\Facades\Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateTeamMembersTable extends Migration
{
    public function up()
    {
        Schema::create('appspaceweb_team_members', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->string('name');
            $table->string('stack_string');

            $table->string('link');

            $table->smallInteger('sort_order')->default(0);
            $table->boolean('is_published')->default(false);

            $table->timestamps();
            $table->softDeletes();
        });

    }

    public function down()
    {
        Schema::dropIfExists('appspaceweb_team_members');
    }
}
