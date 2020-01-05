<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Favorite;
use App\User;
use App\Product;

class FavoriteController extends Controller
{
    public function index() {
        return view(
            'user.favorites',
            [
                'toggle_class' => false
            ]
        );
    }

    public function save($store_id, Request $request) {
        $user = $request->session()->get('user');
        $client = User::find($user['id'])->client;
        
        $new_favorite = new Favorite;
        $new_favorite->store_id = $store_id;
        $new_favorite->client_id = $client->id;
        $new_favorite->save();

        return redirect()->route('shop', [ 'id' => $store_id]);
    }

    public function delete($store_id, Request $request) {
        $user = $request->session()->get('user');
        $client = User::find($user['id'])->client;

        $following = Favorite::where('store_id', $store_id)->where('client_id', $client->id)->delete();

        return redirect()->route('shop', ['id' => $store_id]);
    }

    public function destroy(Request $request) {
        $data = $request->all();
        $user_id = $data['userId'];
        $store_id = $data['storeId'];
        $client_id = User::find($user_id)->client->id;
        Favorite::where('store_id', $store_id)->where('client_id', $client_id)->delete();

        return response()->json([
            'success' => true
        ]);
    }

    public function get(Request $request) {
        $user = $request->session()->get('user');
        $client = User::find($user['id'])->client;

        $favorites = Favorite::where('client_id', $client->id)->get();
        $stores = array();

        foreach($favorites as $favorite) {
            
            $products = Product::where('store_id', $favorite->store->id)
            ->orderBy('created_at', 'desc')
            ->take(5)
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
