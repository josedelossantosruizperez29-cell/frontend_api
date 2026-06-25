<?php

use App\Http\Controllers\authcontroller;
use Illuminate\Support\Facades\Route;

Route::view('/', 'auth.login')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

route::post('login', [authcontroller::class, 'login'])->name('login');

require __DIR__.'/settings.php';
