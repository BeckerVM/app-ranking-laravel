<?php

namespace App\Http\Controllers;

use App\Store;
use App\Product;
use Illuminate\Http\Request;

class IndexController extends Controller {
    
    public function index() {
        $new_products = Product::orderBy('created_at', 'desc')->take(10)->get();

        return view(
            'home',
            [
                'toggle_class' => false, 
                'login' => false, 
                'auth' => true,
                'new_products' => $new_products
            ]
        );
    }

    public function product($id) {
        return view(
            'user.product',
            [
                'toggle_class' => false,
            ]
        );
    }
}
