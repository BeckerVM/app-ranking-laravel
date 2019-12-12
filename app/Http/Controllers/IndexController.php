<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller {
    
    public function index() {
        return view(
            'user.product',
            [
                'toggle_class' => false, 
                'login' => false, 
                'auth' => true
            ]
        );
    }
}
