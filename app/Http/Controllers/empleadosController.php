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
        $response = Http::withToken(session('token'))->get(env('API_URL').'/empleados');
        $datos = $response->json()['data'];
        return view('Empleados.index', compact('datos'));
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
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
