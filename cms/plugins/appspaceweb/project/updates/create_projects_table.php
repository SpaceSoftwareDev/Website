<?php namespace AppSpaceWeb\Project\Updates;

use October\Rain\Support\Facades\Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateProjectsTable extends Migration
{
    public function up()
    {
        Schema::create('appspaceweb_project_projects', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->string('headline');
            $table->string('title');
            $table->text('description');
            $table->boolean('is_published')->default('false');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('appspaceweb_project_projects');
    }
}
