<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use function Pest\Laravel\withToken;

class empleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $page=request('page',1);
        $response = Http::withToken(session('token'))->get(env('API_URL').'/empleados?page='.$page);
        $respuesta = $response->json();
        return view('Empleados.index', [
            'datos'=>$respuesta['data'],
            'paginacion'=>$respuesta
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
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
  
        return view('Empleados.crear', compact('todosLosCargos'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        //
        $response = Http::withToken(session('token'))->post(env('API_URL').'/empleados',[
            'nombre'=>$request->nombre,
            'apellido'=>$request->apellido,
            'fecha_nacimiento'=>$request->fecha,
            'fecha_de_ingreso'=>now()->format('Y-m-d'),
            'salario'=>$request->salario,
            'estado'=>"activo",
            'id_cargo'=>$request->cargo

        ]);

        return redirect()->route('empleados.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $response = Http::withToken(session('token'))->get(env('API_URL').'/cargos');
        $datos = $response->json();
        $todosLosCargos=$datos['data'];
        $ultima_pagina=$datos['last_page'];
        for ($pagina=2; $pagina<=$ultima_pagina ; $pagina++) { 
            $responsePage = Http::withToken(session('token'))->get(env('API_URL')."/cargos?page=$pagina");
            $datosPagina=$responsePage->json();
            $todosLosCargos=array_merge(
                $todosLosCargos,
                $datosPagina['data']
            );
        }
        $responseem =Http::withToken(session('token'))->get(env('API_URL')."/empleados/{$id}");
         $datos=$responseem->json();
         return view('Empleados.edit',compact('datos','todosLosCargos'));
    }


    public function detalle_empleado($id){
       $response =Http::withToken(session('token'))->get(env('API_URL')."/detalle_empleado/{$id}");
        $datos = $response->json();
        return view('empleados.detalle',compact('datos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $response =Http::withToken(session('token'))->put(env('API_URL')."/empleados/{$id}",[
            'nombre'=>$request->nombre,
            'apellido'=>$request->apellido,
            'salario'=>$request->salario,
            'id_cargo'=>$request->cargo

        ]);
        return redirect()->route('empleados.index');
        
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $valor = (int) $id;
        $response =Http::withToken(session('token'))->delete(env('API_URL')."/empleados/{$id}");
         return redirect()->route('empleados.index');
    }
}
