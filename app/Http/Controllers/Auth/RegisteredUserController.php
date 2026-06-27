<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
       $response = Http::post(env('API_URL').'/register',[
        'name'=> $request->name,
        'email'=>  $request->email,
        'password'=> $request->password

       ]);
       if (!$response->successful()) {
        return back()->withErrors([
            'email'=>'error usuario ya existe'

        ]);
        
       }
       $datos = $response->json();
       session([
        'token'=>$datos['token'],
        'user'=> $datos['user']

       ]);

        $request->session()->regenerate();

        return redirect()->route('dashboard');
    }
}
