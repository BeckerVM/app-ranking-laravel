<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GalleryShop extends Model
{
    protected $table = 'gallery_shops';

    public function store()
    {
        return $this->belongsTo('App\Store');
    }
}
