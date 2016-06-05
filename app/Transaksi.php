<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    //
    protected $fillable=['barang_id','formid','tanggal','qty','status'];

    public function barang(){
    	return $this->belongsTo('App\Barang','barang_id');
    }

}
