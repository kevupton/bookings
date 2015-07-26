<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionEquipmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('session_equipment', function(Blueprint $table) {
            $table->integer('session_id')->unsigned()->index();
            $table->foreign('session_id')->references('id')->on('sessions');
            $table->integer('equipment_id')->unsigned()->index();
            $table->foreign('equipment_id')->references('id')->on('equipment');
            $table->integer('qty')->unsigned();
            $table->primary(array('session_id', 'equipment_id'));
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
        Schema::drop('session_equipment');
    }
}
