<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\preguntas;

class preguntasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // Mostrar una lista de registros
        // $preguntas = preguntas::all();
        return preguntas::all();
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


        $preguntas = new preguntas();
        $preguntas->pregunta = $request->get('pregunta');
        $preguntas->category_id = $request->get('category_id');
        if ($request->hasFile('imagen_pregunta')) {
            $imagen = $request->file('imagen_pregunta');
            $destino = 'images/';
            $nombre = $imagen->getClientOriginalName();
            $guardado = $request->file('imagen_pregunta')->move($destino, $nombre);
            $preguntas->imagen_pregunta = $destino . $nombre;
        }
        $preguntas->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return preguntas::find($id);
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
        $preguntas = preguntas::find($id);
        $preguntas->pregunta = $request->get('pregunta');
        $preguntas->category_id = $request->get('category_id');
        if ($request->hasFile('imagen_pregunta')) {
            $imagen = $request->file('imagen_pregunta');
            $destino = 'images/';
            $nombre = $imagen->getClientOriginalName();
            $guardado = $request->file('imagen_pregunta')->move($destino, $nombre);
            $preguntas->imagen_pregunta = $destino . $nombre;
        }
        $preguntas->update();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $preguntas = preguntas::find($id);
        $preguntas->delete();
    }
}
