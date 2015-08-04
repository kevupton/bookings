<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVenuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venues', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_venue_id')->unsigned()->index()->nullable();
            $table->foreign('parent_venue_id')->references('id')->on('venues');
            $table->boolean('is_bookable')->default(0);
            $table->decimal('longitude', 10,7)->nullable();
            $table->decimal('latitude', 10,7)->nullable();
            $table->string('address', 150)->nullable();
            $table->integer('capacity');
            $table->string('name');
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
        Schema::drop('venues');
    }
}
