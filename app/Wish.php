<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wish extends Model
{
    protected $table = 'whishes';

    public function product() {
        return $this->belongsTo('App\Product');
    }

    public function client() {
        return $this->belongsTo('App\Client');
    }
}
