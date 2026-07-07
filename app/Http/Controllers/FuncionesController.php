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
        $response = Http::withToken(session('token'))->get(env('API_URL') . '/cargos');
        $datos = $response->json();
        $todosLosCargos = $response['data'];
        $ultima_pagina = $response['last_page'];
        for ($pagina = 2; $pagina < $ultima_pagina; $pagina++) {
            $responsePage = Http::withToken(session('token'))->get(env('API_URL') . "/cargos?page=$pagina");
            $datosPagina = $responsePage->json();
            $todosLosCargos = array_merge(
                $todosLosCargos,
                $datosPagina['data']
            );



        }
        //le agregamos la funcionalidad al filtro de cargos
        $cargoFiltro = request('cargo');
        if ($cargoFiltro) {
            $responses = Http::withToken(session('token'))->get(env('API_URL') . "/detalle_cargos/{$cargoFiltro}");
            $detalle = $responses->json();
            return view('Funciones.index', [
                'datos' => $detalle['funciones'],
                'todosLosCargos' => $todosLosCargos,
                'cargoFiltro' => $cargoFiltro,
                'paginacion' => null
            ]);
        }
        $page = request('page', 1);
        $reponse = Http::withToken(session('token'))->get(env('API_URL') . '/funcionCargos?page=' . $page);
        $datos = $reponse->json();
        return view('Funciones.index', [
            'datos' => $datos['data'],
            'paginacion' => $datos,
            'todosLosCargos' => $todosLosCargos,
            'cargoFiltro' => null
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $response = Http::withToken(session('token'))->get(env('API_URL') . '/cargos');
        $datos = $response->json();
        $todosLosCargos = $response['data'];
        $ultima_pagina = $response['last_page'];
        for ($pagina = 2; $pagina < $ultima_pagina; $pagina++) {
            $responsePage = Http::withToken(session('token'))->get(env('API_URL') . "/cargos?page=$pagina");
            $datosPagina = $responsePage->json();
            $todosLosCargos = array_merge(
                $todosLosCargos,
                $datosPagina['data']
            );



        }
        return view('funciones.crear', compact('todosLosCargos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $responses = Http::withToken(session('token'))->post(env('API_URL') . '/funcionCargos', [
            'descripcion_funcion' => $request->nombre,
            'estado' => $request->estado,
            'id_cargo' => $request->cargo
        ]);
        return redirect()->route('funciones.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $response = Http::withToken(session('token'))->get(env('API_URL') . "/funcionCargos/{$id}");
        $datos = $response->json();
        $id_cargo = $response['id_cargo'];
        $responses = Http::withToken(session('token'))->get(env('API_URL') . "/cargos/{$id_cargo}");
        return view('Funciones.detalle', [
            'datos' => $datos,
            'cargo' => $responses->json()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $response = Http::withToken(session('token'))->get(env('API_URL') . "/funcionCargos/{$id}");
        $datos = $response->json();
        return view('Funciones.edit', [
            'datos' => $datos
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $responses = Http::withToken(session('token'))->put(env('API_URL') . "/funcionCargos/{$id}", [
            'descripcion_funcion' => $request->nombre,
        ]);
        return redirect()->route('funciones.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $response = Http::withToken(session('token'))->delete(env('API_URL') . "/funcionCargos/{$id}");
        return redirect()->route('funciones.index');
    }
}
