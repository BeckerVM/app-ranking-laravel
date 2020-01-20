<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentaryProduct extends Model
{
    protected $table = 'comentary_products';

    public function product() {
        return $this->belongsTo('App\Product');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
