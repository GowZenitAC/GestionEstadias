<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carreras;

class CarrerasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Carreras::all();
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
        $carrera=new Carreras();
        $carrera->id=$request->get('id');
        $carrera->carrera=$request->get('carrera');
        $carrera->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return Carreras::find($id);
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
        $carrera=Carreras::find($id);
        $carrera->carrera=$request->get('carrera');
        $carrera->update();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $carrera=Carreras::find($id);
        $carrera->delete();
    }
}
