<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OpcionesTSU;

class OpcionesTSUController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return OpcionesTSU::all();
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
        $opciones=new OpcionesTSU();
        $opciones->id=$request->get('id');
        $opciones->optiontsu=$request->get('optiontsu');
        $opciones->puntostsu=$request->get('puntostsu');
        $opciones->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return OpcionesTSU::find($id);
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
        $opciones=OpcionesTSU::find($id);
        $opciones->optiontsu=$request->get('optiontsu');
        $opciones->puntostsu=$request->get('puntostsu');
        $opciones->update();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $opciones=OpcionesTSU::find($id);
        $opciones->delete();
    }
}
