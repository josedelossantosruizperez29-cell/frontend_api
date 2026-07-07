<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CargoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page=request('page',1);
      $response = Http::withToken(session('token'))->get(env('API_URL').'/cargos?page='.$page);
        $respuesta = $response->json();
        return view('Cargos.index', [
            'datos'=>$respuesta['data'],
            'paginacion'=>$respuesta
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return View('cargos.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
                $response = Http::withToken(session('token'))->post(env('API_URL').'/cargos',[
            'nombre_cargo'=>$request->nombre,
            'descripcion'=>$request->descripcion,

        ]);
             return redirect()->route('cargos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
      $response = Http::withToken(session('token'))->get(env('API_URL')."/detalle_cargos/{$id}");
      
      $datos=$response->json();
      return View('cargos.detalle',compact('datos'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    $response = Http::withToken(session('token'))->get(env('API_URL')."/cargos/{$id}");
      
      $datos=$response->json();
      return View('cargos.edit',compact('datos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $response = Http::withToken(session('token'))->put(env('API_URL')."/cargos/{$id}",[
            'nombre_cargo'=>$request->nombre,
            'descripcion'=>$request->descripcion,
        ]);
        if (!$response->successful()) {
            throw ValidationException::withMessages($response->json('errors'));
            
        }
        return redirect()->route('cargos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      $response =Http::withToken(session('token'))->delete(env('API_URL')."/cargos/{$id}");
           return redirect()->route('cargos.index');
      
    }
}
