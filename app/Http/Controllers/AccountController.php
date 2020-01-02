<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Favorite;
use App\User;
use App\Product;

class AccountController extends Controller
{
    public function get(Request $request) {
        $user = $request->session()->get('user');
        $client = User::find($user['id'])->client;

        $favorites = Favorite::where('client_id', $client->id)->get();
        $stores = array();

        foreach($favorites as $favorite) {
            
            $products = Product::where('store_id', $favorite->store->id)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

            $prod = array();
            
            foreach($products as $product) {

                $image = $product->images[0]->img_url;

                array_push($prod, [
                    'price' => $product->price,
                    'image' => $image,
                    'id' => $product->id,
                    'name' => $product->name,
                    'url' => 'http://localhost:3000/tienda/producto/'.$product->id
                ]);
            }

            array_push($stores, [
                'store' => $favorite->store,
                'products' => $prod
            ]);

        }

        return response()->json([
            'stores' => $stores
        ]);
    }
}
