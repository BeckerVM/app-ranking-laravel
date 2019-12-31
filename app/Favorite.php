<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function store()
    {
        return $this->belongsTo('App\Store');
    }
}
