<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;
use App\Peminjam;
use Session;
class Barang extends Model
{
    //

	protected $fillable = ['nama_barang','photo','model','deskripsi','id_user','price'];
    protected $appends = ['photo_path'];

    public function carts()
{
return $this->hasMany('App\Cart');
}

public function user()
{
return $this->belongsTo('App\User','id_user');
}

public function kategori()
{
return $this->belongsToMany('App\Kategori');
}

public function getPhotoPathAttribute()
{
if ($this->photo !== '') {
return url('/img/barang/' . $this->photo);
} else {
return 'http://placehold.it/850x618';
}
}


public function getCategoryListsAttribute()
{
if ($this->kategori()->count() < 1) {
return null;

}
return $this->kategori->lists('id')->all();
}


public static function boot()
{
parent::boot();
static::deleting(function($model) {
// remove relations to category
$model->kategori()->detach();
// remove relation to cart
$model->carts()->delete();
});

 /*self::deleting(function($barang)
        {
            if ($barang->borrowLogs()->count() > 0) {
                Session::flash("flash_notification", [
                    "level"=>"danger", 
                    "message"=>"Barang $barang->nama_barang sudah pernah/sedang  dipinjam."
                ]);
                return false;
            }
        });*/
}


public function borrowLogs()
    {
        return $this->hasMany('App\Peminjam');   
    }
public function getBorrowedAttribute()
    {
       return $this->borrowLogs()->borrowed()->count(); 
    }

}
 