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
        $data = $response->json();
        session([
            'token' => $data['token'],
            'user' => $data['user'] 
        ]);
        return view('dashboard',$data);
    }
}
