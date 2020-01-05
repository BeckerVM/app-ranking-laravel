<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wish;
use App\User;
use App\Product;

class WishController extends Controller
{
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
}
