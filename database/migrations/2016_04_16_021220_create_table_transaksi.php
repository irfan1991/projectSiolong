<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //s
        Schema::create('transaksis', function ($table){
        $table->increments('id');
        $table->string('barang_id');
        $table->string('formid');
        $table->date('tanggal');
        $table->string('qty');
        $table->string('status');

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
        Schema::drop('transaksis');
    }
}
