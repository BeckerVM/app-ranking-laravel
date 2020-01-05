<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function favorites() {

        return $this->hasMany('App\Favorite');
    }

    public function wishes() {
        return $this->hasMany('App\Wish');
    }

}
