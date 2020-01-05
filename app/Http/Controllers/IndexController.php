<?php

namespace App\Http\Controllers;

use App\Store;
use App\User;
use App\Product;
use App\Favorite;
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

    public function product($id, Request $request) {
        $finded_product = Product::find($id);
        $store = $finded_product->store;
        $data = [
            'toggle_class' => false,
            'store' => $store,
            'following' => false
        ];

        if ($request->session()->has('user')) {

            $user = $request->session()->get('user');
            $client = User::find($user['id'])->client;
            $following = Favorite::where('store_id', $store->id)->where('client_id', $client->id)->first();
            $data['following'] =$following;

        }

        return view(
            'user.product',
            $data
        );
    }

    public function products($id, Request $request) {
        $store = Store::find($id);
        $products = $store->products;
        $data = [
            'toggle_class' => false,
            'store' => $store,
            'products' => $products,
            'following' => false
        ];

        if ($request->session()->has('user')) {

            $user = $request->session()->get('user');
            $client = User::find($user['id'])->client;
            $following = Favorite::where('store_id', $store->id)->where('client_id', $client->id)->first();
            $data['following'] =$following;

        }

        return view(
            'user.products',
            $data
        );
    }

    public function store($id, Request $request) {
        $store = Store::find($id);
        $products = $store->products;
        $data = [
            'toggle_class' => false,
            'store' => $store,
            'products' => $products,
            'following' => false
        ];
        
        if ($request->session()->has('user')) {

            $user = $request->session()->get('user');
            $client = User::find($user['id'])->client;
            $following = Favorite::where('store_id', $store->id)->where('client_id', $client->id)->first();
            $data['following'] =$following;

        }

        return view(
            'user.deal',
            $data
        );
    }
}
