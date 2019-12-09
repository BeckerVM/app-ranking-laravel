<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login() {
        return view(
            'auth.login', 
            [
                'toggle_class' => true, 
                'login' => true, 
                'auth' => !true
            ]
        );
    }

    public function register() {
        return view('auth.register');
    }
}
