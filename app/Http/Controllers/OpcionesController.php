<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Opciones;

class OpcionesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Opciones::all();
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
        $opciones=new Opciones();
        $opciones->id=$request->get('id');
        $opciones->opciones=$request->get('opciones');
        $opciones->puntos=$request->get('puntos');
        $opciones->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return Opciones::find($id);
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
        $opciones=Opciones::find($id);
        $opciones->opciones=$request->get('opciones');
        $opciones->puntos=$request->get('puntos');
        $opciones->update();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $opciones=Opciones::find($id);
        $opciones->delete();
    }
}
