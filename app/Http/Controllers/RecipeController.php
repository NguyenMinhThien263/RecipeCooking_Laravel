<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $recipes = Recipe::all();
        return view('recipe.index', compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('recipe.addform');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'user_id' => 'required',
        ]);
        Recipe::created($request->all());
        return redirect()->route('recipe.index')->with('msg', 'Recipe created success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $recipe = Recipe::find($id);
        return view('recipe.show', compact('recipe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $recipe = Recipe::find($id);
        return view('recipe.editform', compact('recipe'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'user_id' => 'required',
        ]);
        $recipe = Recipe::findOrFail($id);
        if (isset($recipe)) {
            $recipe->update($request->all());
            return redirect()->route('recipe.index')->with('msg', 'update recipe successfully');
        } else {
            return redirect()->route('recipe.index')->with('msg', 'update recipe failure');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $recipe = Recipe::findOrFail($id);
        if (isset($recipe)) {
            $recipe->delete();
            return redirect()->route('recipe.index')->with('msg', 'delete recipe successfully');
        } else {
            return redirect()->route('recipe.index')->with('msg', 'delete recipe failure');
        }
    }
}
