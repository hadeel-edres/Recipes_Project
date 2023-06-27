<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recipes;
use App\Models\Categories;
use App\Http\Requests\RecipesStoreRequest;
use Illuminate\Support\Facades\Storage;

class RecipesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recipes= Recipes::all();
        return view('admin.recipes.index', compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories= Categories::all();
        return view('admin.recipes.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RecipesStoreRequest $request)
    {
        $image= $request->file('image')->store('public/recipes');
        $recipe= Recipes::create([
            'name' => $request->name,
            'description' => $request->description,
            'ingredients' => $request->ingredients,
            'steps' => $request->steps,
            'image' => $image
           
        ]);

        if ($request->has('categories')) {
            $recipe->categories()->attach($request->categories);
        }
        return to_route('admin.recipes.index')->with('success', 'Rezept erfolgreich erstellt');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $recipe = Recipes::find($id);
        if (!$recipe) {
            dd('error');
        }

        return view("admin.recipes.show", compact("recipe"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recipes $recipe)
    {
        $categories = Categories::all();
        return view('admin.recipes.edit', compact('recipe', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recipes $recipe)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'ingredients'=>'required',
            'steps'=>'required'
        ]);
        $image= $recipe->image;
        if($request->hasFile('image')){
            Storage::delete($recipe->image);
            $image= $request->file('image')->store('public/recipes');
        }
        $recipe->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'ingredients'=>$request->ingredients,
            'steps'=>$request->steps,
            'image'=>$image
        ]);
        if ($request->has('categories')) {
            $recipe->categories()->sync($request->categories);
        }
        return to_route('admin.recipes.index')->with('success', 'Rezept erfolgreich aktualisiert');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipes $recipe)
    {
        Storage::delete($recipe->image);
        $recipe->categories()->detach();
        $recipe->delete();
        return to_route('admin.recipes.index')->with('danger', 'Rezept erfolgreich gelöscht');
    }
}
