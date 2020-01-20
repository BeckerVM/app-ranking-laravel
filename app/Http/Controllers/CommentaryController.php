<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Product;
use App\CommentaryProduct;

class CommentaryController extends Controller
{
    public function get(Request $request) {
        $data = $request->all();
        $commentaries = CommentaryProduct::where('product_id', $data['productId'])->orderBy('updated_at', 'desc')->get();
        $total_commentaries = count($commentaries);
        $one = count(CommentaryProduct::where('calification', 1)->where('product_id', $data['productId'])->get());
        $two = count(CommentaryProduct::where('calification', 2)->where('product_id', $data['productId'])->get());
        $three = count(CommentaryProduct::where('calification', 3)->where('product_id', $data['productId'])->get());
        $four = count(CommentaryProduct::where('calification', 4)->where('product_id', $data['productId'])->get());
        $five = count(CommentaryProduct::where('calification', 5)->where('product_id', $data['productId'])->get());
        $commentary = CommentaryProduct::where('product_id', $data['productId'])->where('user_id', $data['userId'])->first();
        $porcent = [
            'one' => 0,
            'two' => 0,
            'three' => 0,
            'four' => 0,
            'five' => 0,
        ];

        $calification = 0;
        $mapCommentaries = [];

        foreach($commentaries as $comment) {
            $calification = $calification + $comment->calification;

            array_push($mapCommentaries, [
                'commentary' => $comment,
                'user' => $comment->user
            ]);
        }

        if($total_commentaries != 0) {
            $porcent =  [
                'one' => (100 * $one) / $total_commentaries,
                'two' => (100 * $two) / $total_commentaries,
                'three' => (100 * $three) / $total_commentaries,
                'four' => (100 * $four) / $total_commentaries,
                'five' => (100 * $five) / $total_commentaries,
            ];
        }

        return response()->json([
            'commentaries' => $mapCommentaries,
            'totalCommentaries' => $total_commentaries,
            'commentary' => $commentary,
            'calification' => [
                'one' => $one,
                'two' => $two,
                'three' => $three,
                'four' => $four,
                'five' => $five,
            ],
            'porcent' => $porcent,
            'finalCalification' => $calification / $total_commentaries
        ]);
    }

    public function save(Request $request) {
        $data = $request->all();

        $commnetary = new CommentaryProduct;
        $commnetary->content = $data['content'];
        $commnetary->calification = $data['calification'];
        $commnetary->user_id = $data['userId'];
        $commnetary->product_id = $data['productId'];

        $commnetary->save();

        return response()->json([
            'success' => true
        ]);
    }

    public function update(Request $request) {
        $data = $request->all();
        $comment = CommentaryProduct::where('user_id', $data['userId'])->where('product_id', $data['productId'])->first();
        $comment->content = $data['content'];
        $comment->calification = $data['calification'];
        $comment->save();

        return response()->json([
            'success' => true
        ]);
    }
}
