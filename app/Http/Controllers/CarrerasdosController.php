<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarrerasDos;

class CarrerasdosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return CarrerasDos::all();
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
        $carrera=new CarrerasDos();
        $carrera->id=$request->get('id');
        $carrera->carrera2=$request->get('carrera2');
        $carrera->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return CarrerasDos::find($id);
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
        $carrera=CarrerasDos::find($id);
        $carrera->carrera2=$request->get('carrera2');
        $carrera->update();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $carrera=CarrerasDos::find($id);
        $carrera->delete();
    }
}
