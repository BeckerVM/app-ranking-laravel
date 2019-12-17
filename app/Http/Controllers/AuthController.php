<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AuthController extends Controller
{
    public function login() {
        return view(
            'auth.login', 
            [
                'toggle_class' => true, 
                'login' => true, 
            ]
        );
    }

    public function loginUser(Request $request) {
        $data = $request->all();
        $user = User::where('email', $data['email'])->first();
        $response = [];
        $code = 200;

        if($user) {
            if($user->password == $data['password']) {
                $request->session()->put('user', [
                    'email' => $user->email,
                    'rol' => $user->rol,
                    'state' => $user->state,
                    'id' => $user->id
                ]);
                $response = ['rol' => $user->rol];
            } else {
                $response = ['error' => 'Ups! Usuario o contraseña incorrecta intentalo nuevamente.'];
                $code = 404;
            }
        } else {
            $response = ['error' => 'Ups! Usuario no encontrado intentalo nuevamente.'];
            $code = 404;
        }
   
        return response()->json($response, $code);
    }

    public function logoutUser(Request $request) {
        $request->session()->forget('user');
        return redirect()->route('login');
    }

    public function register() {
        return view(
            'auth.register',
            [
                'toggle_class' => true, 
                'login' => false
            ]
        );
    }

    
}
