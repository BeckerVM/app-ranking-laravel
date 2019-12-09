<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller {
    
    public function index() {
        return view(
            'home',
            [
                'toggle_class' => false, 
                'login' => false, 
                'auth' => true
            ]
        );
    }
}
