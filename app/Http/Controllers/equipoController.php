<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipos;
class equipoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Equipos::all();

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
        
        $equipos=new Equipos();
        $equipos->id=$request->get('id');
        $equipos->nombre=$request->get('nombre');
       
        $equipos->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return Equipos::all();
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
        $equipos=Equipos::find($id);
        $equipos->nombre=$request->get('nombre');
        
        $equipos->update();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $equipos=Equipos::find($id);
        $equipos->delete();
    }
}
