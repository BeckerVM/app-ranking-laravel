<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProductById(Request $request) {
        $data = $request->all();
        $finded_product = Product::find($data['id']);
        $product_images = $finded_product->images;
        $product_store = $finded_product->store;

        return response()->json([
            'product' => $finded_product,
            'productImages' => $product_images,
            'productStore' => $product_store
        ]);
    }
}
