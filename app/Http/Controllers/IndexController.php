<?php

namespace App\Http\Controllers;

use App\Store;
use App\Product;
use Illuminate\Http\Request;

class IndexController extends Controller {
    
    public function index() {
        $new_products = Product::orderBy('created_at', 'desc')->take(10)->get();
        $stores = Store::all();

        return view(
            'home',
            [
                'toggle_class' => false, 
                'login' => false, 
                'auth' => true,
                'new_products' => $new_products,
                'stores' => $stores
            ]
        );
    }

    public function product($id) {
        $finded_product = Product::find($id);
        $store = $finded_product->store;

        return view(
            'user.product',
            [
                'toggle_class' => false,
                'store' => $store
            ]
        );
    }

    public function products($id) {
        $store = Store::find($id);
        $products = $store->products;

        return view(
            'user.products',
            [
                'toggle_class' => false,
                'store' => $store,
                'products' => $products
            ]
        );
    }

    public function store($id) {
        $store = Store::find($id);
        $products = $store->products;

        return view(
            'user.deal',
            [
                'toggle_class' => false,
                'store' => $store,
                'products' => $products
            ]
        );
    }
}
