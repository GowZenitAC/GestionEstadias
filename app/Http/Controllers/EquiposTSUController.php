<?php

namespace App\Http\Controllers;

use App\Models\EquiposTSU;
use Illuminate\Http\Request;

class EquiposTSUController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return EquiposTSU::all();
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
        $equipos=new EquiposTSU();
        $equipos->nombretsu=$request->get('nombretsu');
        $equipos->id_carrera=$request->get('id_carrera');
        $equipos->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return EquiposTSU::find($id);
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
        $equipos=EquiposTSU::find($id);
        $equipos->nombretsu=$request->get('nombretsu');
        $equipos->id_carrera=$request->get('id_carrera');
        $equipos->update();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $equipos=EquiposTSU::find($id);
        $equipos->delete();
    }
}
