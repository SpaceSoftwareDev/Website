<?php namespace AppSpaceWeb\Newsletter\Updates;

use October\Rain\Support\Facades\Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateNewslettersTable extends Migration
{
    public function up()
    {
        Schema::create('appspaceweb_newsletter_newsletters', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->string('subject');
            $table->text('content');
            $table->string('status');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('appspaceweb_newsletter_newsletters');
    }
}
