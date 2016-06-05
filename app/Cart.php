<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['user_id', 'barang_id', 'quantity'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function product()
    {
        return $this->belongsTo('App\Barang');
    }
public static function boot()
{
parent::boot();
static::deleting(function($model) {
	$model->product()->delete();

});

}


}
