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
        // con esto obtengo todos los cargos para que el usuario pueda filtrar funciones por cargo
    $response = Http::withToken(session('token'))->get(env('API_URL').'/cargos');
        $datos=$response->json();
        $todosLosCargos=$response['data'];
        $ultima_pagina =$response['last_page'];
        for ($pagina=2; $pagina<$ultima_pagina; $pagina++) { 
            $responsePage = Http::withToken(session('token'))->get(env('API_URL')."/cargos?page=$pagina");
            $datosPagina=$responsePage->json();
                  $todosLosCargos=array_merge(
            $todosLosCargos,
            $datosPagina['data']
        );

        }
        $page=request('page',1);
        $reponse = Http::withToken(session('token'))->get(env('API_URL').'/funcionCargos?page='.$page);
        $datos = $reponse->json();
        return view('Funciones.index',[
            'datos'=>$datos['data'],
            'paginacion'=>$datos,
            'todosLosCargos'=>$todosLosCargos
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
