<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\Http;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
public function store(LoginRequest $request): RedirectResponse
{
    $response = Http::post(env('API_URL').'/login', [
        'email' => $request->email,
        'password' => $request->password
    ]);

    if (!$response->successful()) {
        return back()->withErrors([
            'email' => 'Credenciales incorrectas'
        ]);
    }

    $datos = $response->json();

    session([
        'token' => $datos['token'],
        'user' => $datos['user']
    ]);

    $request->session()->regenerate();

    return redirect()->route('dashboard');
}

    /**
     * Destroy an authenticated session.
     */
public function destroy(Request $request): RedirectResponse
{
    $request->session()->forget([
        'token',
        'user'
    ]);

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login');
}
}
