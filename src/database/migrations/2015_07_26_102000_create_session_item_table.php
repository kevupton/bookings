<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('session_items', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('session_id')->unsigned()->index();
            $table->foreign('session_id')->references('id')->on('sessions');
            $table->string('name');
            $table->integer('price')->unsigned();
            $table->integer('qty')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('session_items');
    }
}
