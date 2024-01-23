<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\equipos;

class equiposController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // Mostrar una lista de registros
        return equipos::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // $category=new Category();
        // $category->id=$request->get('id');
        // $category->name=$request->get('name');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $equipos=new equipos();
        $equipos->id_equipo=$request->get('id_equipo');
        $equipos->nombre=$request->get('nombre');
        // $equipos-> puntuacion=$request->get('puntuacion');
        // $equipos-> tiempo=$request->get('tiempo');
        
        $equipos->save();

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return equipos::find($id);
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
        $equipos=equipos::find($id);
        $equipos->id_equipo=$request->get('id_equipo');
        $equipos->nombre=$request->get('nombre');
        // $equipos-> puntuacion=$request->get('puntuacion');
        // $equipos-> tiempo=$request->get('tiempo');
        
        $equipos->update();
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $equipos=equipos::find($id);
        $equipos->delete();
    }
}
