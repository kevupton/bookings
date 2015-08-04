<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimetableTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('timetables', function(Blueprint $table) {
            $table->integer('available_for_id')->unsigned()->index();
            $table->string('available_for', 128);
            $table->text('sunday');
            $table->text('monday');
            $table->text('tuesday');
            $table->text('wednesday');
            $table->text('thursday');
            $table->text('friday');
            //{ available : {0600-1200, 1400-1700} }
            $table->text('saturday');
            // {
            // {date : 24/12/92, available : {} },
            // {date : 24/11/93, available : {} }
            // }
            $table->text('exceptions');
            // define all columns as an array cast on the model
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('timetables');
    }
}
