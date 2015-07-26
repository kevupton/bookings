<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipment', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name', 64);
            $table->text('description')->nullable();
            $table->decimal('longitude', 10,7);
            $table->decimal('latitude', 10,7);
            $table->string('address', 150);
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
        Schema::drop('equipment');
    }
}
