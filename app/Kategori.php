<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    //

protected $table ='kategoris';
protected $fillable = ['title', 'parent_id'];

public function childs()
{
return $this->hasMany('App\Kategori', 'parent_id');
    }

public function parent()
{
return $this->belongsTo('App\Kategori', 'parent_id');
}
public function barangs()
{
return $this->belongsToMany('App\Barang');
}

public static function boot()
    {
        parent::boot();

        static::deleting(function($model) {
            // remove parent from this category's child
            foreach ($model->childs as $child) {
                $child->parent_id = '';
                $child->save();
            }
            // remove relations to products
            $model->barangs()->detach();
        });
    }


public function getRelatedProductsIdAttribute()

{
$result = $this->barangs->lists('id')->toArray();
foreach ($this->childs as $child) {
$result = array_merge($result, $child->related_products_id);
}
return $result;
}

public function scopeNoParent($query)
{
return $this->where('parent_id', '');
}

public function getTotalProductsAttribute()
{
return Barang::whereIn('id', $this->related_products_id)->count();
}


public function hasParent()
{
return $this->parent_id > 0;
}
public function hasChild()
{
return $this->childs()->count() > 0;
}

}
