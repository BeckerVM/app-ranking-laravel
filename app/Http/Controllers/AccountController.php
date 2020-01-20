<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Favorite;
use App\Wish;
use App\User;
use App\Product;
use App\CommentaryProduct;

class AccountController extends Controller
{
    public function get(Request $request) {
        $user = $request->session()->get('user');
        $client = User::find($user['id'])->client;

        $favorites = Favorite::where('client_id', $client->id)->get();
        $wishes = Wish::where('client_id', $client->id)->get();
        $comments = CommentaryProduct::where('user_id', $user['id'])->get();

        $stores = array();
        $wishes_array = array();

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

        foreach($wishes as $wish) {
            array_push($wishes_array, [
                'id' => $wish->product->id,
                'name' => $wish->product->name,
                'description' => $wish->product->description,
                'description2' => $wish->product->description2,
                'price' => $wish->product->price,
                'sold' => $wish->product->sold,
                'image' =>$wish->product->images[0]->img_url,
                'url' => 'http://localhost:3000/tienda/producto/'.$wish->product->id
            ]);
        }

        return response()->json([
            'stores' => $stores,
            'wishes' => $wishes_array,
            'comments' => $comments
        ]);
    }
}
