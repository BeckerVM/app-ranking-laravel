<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function images()
    {
        return $this->hasMany('App\GalleryProduct');
    }

    public function store() {
        return $this->belongsTo('App\Store');
    }

    public function wishes() {
        return $this->hasMany('App\Wish');
    }
}
