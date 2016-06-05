<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSubkategori extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void$
     */
    public function up()
    {
        //
        Schema::create('subkategoris',function($table){
            $table->increments('id');
            $table->string('name');




        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('subkategoris');
    }
}
