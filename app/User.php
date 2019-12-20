<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function seller() {
        return $this->hasOne('App\Seller');
    }

    public function client() {
        return $this->hasOne('App\Client');
    }

    public function admin() {
        return $this->hasOne('App\Admin');
    }
}
