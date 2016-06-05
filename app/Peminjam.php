<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjam extends Model
{
    //
	protected $table = 'borrow_logs';
    protected $fillable = ['barang_id', 'user_id', 'is_returned'];
    protected $casts = [
        'is_returned' => 'boolean',
    ];

    public function barang()
{
return $this->belongsTo('App\Barang');
}
public function user()
{
return $this->belongsTo('App\User');
}


 public function scopeReturned($query)
    {
        return $query->where('is_returned', 1);
    }
    
    public function scopeBorrowed($query)
    {
        return $query->where('is_returned', 0);
    }
}
