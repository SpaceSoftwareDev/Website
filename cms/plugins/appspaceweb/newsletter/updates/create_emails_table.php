<?php namespace AppSpaceWeb\Newsletter\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateEmailsTable extends Migration
{
    public function up()
    {
        Schema::create('appspaceweb_newsletter_emails', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('email');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('appspaceweb_newsletter_emails');
    }
}
