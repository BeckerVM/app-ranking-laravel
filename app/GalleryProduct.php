<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GalleryProduct extends Model
{
    protected $table = 'gallery_products';

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
