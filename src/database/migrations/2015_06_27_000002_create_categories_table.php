<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $table = 'categories';
        $check = DB::select('SELECT COUNT(*) as `exists`
            FROM information_schema.tables
            WHERE table_name IN (?)
            AND table_schema = database()',[$table]);

        if(!$check[0]->exists) // No table found, safe to create it.
        {
            Schema::create($table, function(Blueprint $table) {
                $table->increments('id');
                $table->string('category', 30);
                $table->integer('parent_id')->unsigned()->nullable()->index();
                $table->foreign('parent_id')->references('id')->on('categories')->onDelete('restrict')->onUpdate('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
