<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
            if($user->state === 'activo') {
                if(Hash::check($data['password'], $user->password)) {
                    $request->session()->put('user', [
                        'email' => $user->email,
                        'username' => $user->username,
                        'rol' => $user->rol,
                        'state' => $user->state,
                        'id' => $user->id,
                        'profile' => $user->img_profile
                    ]);
                    $response = ['rol' => $user->rol];
                } else {
                    $response = ['error' => 'Ups! Usuario o contraseña incorrecta intentalo nuevamente.'];
                    $code = 404;
                }
            } else {
                $response = ['error' => 'Ups! esta cuenta no ha sido activada intenta nuevamente.'];
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

    public function registerUser(Request $request) {
        $data = $request->all();
        $response = [];
        $code = 200;

        $user = User::where('email', $data['email'])->first();

        if($user) {
            $response = ['error' => 'Ups! El correo electronico ingresado ya esta en uso.'];
            $code = 400;
        } else {
            $new_user = new User;
            $new_user->email = $data['email'];
            $new_user->username = $data['username'];
            $new_user->password = Hash::make($data['password']);
            $new_user->img_profile = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQTMXrsFHeVVEaWkCc5Ex10ysdwqK3ukMUmG1MRaAOSuVUq-zC9&s';
            $new_user->rol = $data['rol'];

            if($data['rol'] == 'normal') {
                $new_user->state = 'activo';
                $response['message'] = 'Ahora puede iniciar sesion';
            } else {
                $new_user->state = 'pendiente';
                $response['message'] = 'Por favor espere un momento la activacion de su cuenta';
            }

            $response['rol'] = $data['rol'];
            
            $new_user->save();
        }

        
        return response()->json($response, $code);
    }
    
}
