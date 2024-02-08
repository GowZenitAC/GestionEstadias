<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Resultados;

class ResultadosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Resultados::all();
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
        $resultados=new Resultados();
        $resultados->id=$request->get('id');
        $resultados->id_equipo=$request->get('id_equipo');
        $resultados->puntos=$request->get('puntos');
        $resultados->tiempo=$request->get('tiempo');
        $resultados->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return Resultados::find($id);
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
        $resultados=Resultados::find($id);
        $resultados->id_equipo=$request->get('id_equipo');
        $resultados->puntos=$request->get('puntos');
        $resultados->update();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $resultados=Resultados::find($id);
        $resultados->delete();
    }
    
}
