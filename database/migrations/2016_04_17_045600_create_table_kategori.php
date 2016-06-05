<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKategori extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('kategoris', function($table){
            $table->increments('id');
            $table->string('title');
           $table->integer('parent_id');
            $table->timestamps();
        });


        Schema::create('barang_kategori', function (Blueprint $table) {
        $table->increments('id');
        $table->integer('barang_id')->unsigned();
        $table->integer('kategori_id')->unsigned();
        $table->foreign('barang_id')->references('id')->on('barangs');
        $table->foreign('kategori_id')->references('id')->on('kategoris');
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
        Schema::drop('kategoris');
        Schema::drop('barang_kategori');

    }
}
