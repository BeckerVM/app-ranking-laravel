<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function seller()
    {
        return $this->belongsTo('App\Seller');
    }

    public function products() {
        return $this->hasMany('App\Product');
    }

    public function images()
    {
        return $this->hasMany('App\GalleryShop');
    }

    public function favorites() {
        return $this->hasMany('App\Favorite');
    }
}
