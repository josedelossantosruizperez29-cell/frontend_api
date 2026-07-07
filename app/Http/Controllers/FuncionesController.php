<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FuncionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page=request('page',1);
        $reponse = Http::withToken(session('token'))->get(env('API_URL').'/funcionCargos?page='.$page);
        $datos = $reponse->json();
        return view('Funciones.index',[
            'datos'=>$datos['data'],
            'paginacion'=>$datos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $response =Http::withToken(session('token'))->delete(env('API_URL')."/funcionCargos/{$id}");
        return redirect()->route('funciones.index');
    }
}
