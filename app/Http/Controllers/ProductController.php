<?php

namespace App\Http\Controllers;

use App\Product;
use App\Wish;
use App\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProductById(Request $request) {
        $data = $request->all();
        $finded_product = Product::find($data['id']);
        $product_images = $finded_product->images;
        $product_store = $finded_product->store;
        $client_id = null;

        if($data['userId'] != null) {
            $client_id = User::find($data['userId'])->client->id;
        }

        $wish = Wish::where('product_id', $finded_product->id)->where('client_id', $client_id)->first();

        $response = [
            'product' => $finded_product,
            'productImages' => $product_images,
            'productStore' => $product_store,
            'wish' => $wish
        ];

        return response()->json($response);
    }
}
