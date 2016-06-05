<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBarang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::create('barangs',function ($table){
            $table->increments('id');
            $table->string('nama_barang');
            $table->string('photo');
            $table->string('model');
            $table->double('price');
        $table->string('deskripsi');
                     $table->integer('id_user');
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
        //
        Schema::drop('users');
    }
}
