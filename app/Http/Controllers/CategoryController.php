<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // Mostrar una lista de registros
        return Category::all();
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
        $category=new Category();
        $category->id=$request->get('id');
        $category->name=$request->get('name');
        $category->save();

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return Category::find($id);
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
        $category=Category::find($id);
        $category->name=$request->get('name');
        $category->update();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $category=Category::find($id);
        $category->delete();
    }
}
