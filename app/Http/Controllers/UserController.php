<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index(Request $request) {
        $users = User::orderBy('created_at', 'DESC')->paginate(4);

        return response()->json([
            'paginate' => [
                'total' => $users->total(),
                'current_page' => $users->currentPage(),
                'per_page' => $users->perPage(),
                'last_page' => $users->lastPage(),
                'from' => $users->firstItem(),
                'to' => $users->lastItem()
            ],
            'users' => $users
        ], 200);
    }

    public function updateState(Request $request) {
        $data = $request->all();
        $finded_user = User::find($data['id']);
        $finded_user->state = $data['state'];
        $finded_user->save();

        return response()->json([
            'success' => true
        ]);
    }

    public function destroy($id) {
        User::destroy($id);
        
        return response()->json([
            'success' => true
        ]);
    }
}
