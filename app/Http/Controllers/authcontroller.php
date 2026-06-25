<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class authcontroller extends Controller
{
    // metodo para inciar sesion
    public function login(Request $request){
        $response = Http::post(env('API_URL').'/login',[
            'email' => $request->email,
            'password' => $request->password
        ]);
        $datos = $response->json();
        session([
            'token' => $datos['token'],
            'user' => $datos['user'] 
        ]);
        return redirect()->route('dashboard');
    }
}
