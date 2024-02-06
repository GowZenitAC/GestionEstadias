<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PreguntasTSU;

class PreguntasTSUController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $preguntas = PreguntasTSU::all();
        return $preguntas;
        // paginacion
        // $preguntas = PreguntasTSU::paginate(5);
        // return $preguntas;
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
        $preguntas = new PreguntasTSU();
        $preguntas->pregunta = $request->get('pregunta');
        $preguntas->category_t_s_u_id = $request->get('category_t_s_u_id');
        $preguntas->carreras_id = $request->get('carreras_id');
        if($request->hasFile('imagen_preguntatsu')){
            $imagen = $request->file('imagen_preguntatsu');
            $destino = 'images/';
            $nombre = $imagen->getClientOriginalName();
            $guardado = $request->file('imagen_preguntatsu')->move($destino, $nombre);
            $preguntas->imagen_preguntatsu = $destino.$nombre;
        }
        $preguntas->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return PreguntasTSU::find($id);
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
        $preguntas = PreguntasTSU::find($id);
        $preguntas->pregunta = $request->get('pregunta');
        $preguntas->category_t_s_u_id = $request->get('category_t_s_u_id');
        $preguntas->carreras_id = $request->get('carreras_id');
        if($request->hasFile('imagen_preguntatsu')){
            $imagen = $request->file('imagen_preguntatsu');
            $destino = 'images/';
            $nombre = $imagen->getClientOriginalName();
            $guardado = $request->file('imagen_preguntatsu')->move($destino, $nombre);
            $preguntas->imagen_preguntatsu = $destino.$nombre;
        }
        $preguntas->update();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $preguntas = PreguntasTSU::find($id);
        $preguntas->delete();
    }
}
