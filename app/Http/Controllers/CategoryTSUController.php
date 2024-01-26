<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryTSU;

class CategoryTSUController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return CategoryTSU::all();
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
        $category=new CategoryTSU();
        $category->id=$request->get('id');
        $category->nametsu=$request->get('nametsu');
        $category->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return CategoryTSU::find($id);
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
        $category=CategoryTSU::find($id);
        $category->nametsu=$request->get('nametsu');
        $category->update();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $category=CategoryTSU::find($id);
        $category->delete();
    }
}
