<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wish;
use App\User;
use App\Product;

class WishController extends Controller
{

    public function index() {
        return view(
            'user.wishes',
            [
                'toggle_class' => false
            ]
        );
    }

    public function get(Request $request) {
        $user = $request->session()->get('user');
        $client = User::find($user['id'])->client;

        $wishes = Wish::where('client_id', $client->id)->get();

        $products = array();

        foreach($wishes as $wish) {
            array_push($products, [
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
            'wishes' => $products
        ]);
    }


    public function save(Request $request) {
        $data = $request->all();
        $user_id = $data['userId'];
        $client_id = User::find($user_id)->client->id;
        $product_id = $data['productId'];

        $new_wish = new Wish;
        $new_wish->product_id = $product_id;
        $new_wish->client_id = $client_id;
        $new_wish->save();

        $wish = Wish::where('product_id', $product_id)->where('client_id', $client_id)->first();

        return response()->json([
            'wish' => $wish
        ]);
    }

    public function delete(Request $request) {
        $data = $request->all();
        $user_id = $data['userId'];
        $client_id = User::find($user_id)->client->id;
        $product_id = $data['productId'];

        Wish::where('product_id', $product_id)->where('client_id', $client_id)->delete();
        $wish = Wish::where('product_id', $product_id)->where('client_id', $client_id)->first();
    }
}
