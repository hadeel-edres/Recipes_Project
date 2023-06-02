<?php

namespace App\Http\Controllers;
use App\Models\Userrecipes;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Http\Requests\WelcomeRecipesStoreRequest;

class WelcomeRecipesController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     
     public function welcomeRecipes()
     {
         $userrecipes = Userrecipes::all();
         $specials = Categories::where('name', 'specials')->first();
         return view('welcome', compact('userrecipes', 'specials'));
     }
     

    public function creatrecipe()
    {
        $categories= Categories::all();
        return view('recipes.creat' , compact('categories'));
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
    public function store(WelcomeRecipesStoreRequest $request)
    {
        $image= $request->file('image')->store('public/userrecipes');
        $userrecipes= Userrecipes::create([
            'name' => $request->name,
            'description' => $request->description,
            'ingredients' => $request->ingredients,
            'image' => $image
           
        ]);

        if ($request->has('categories')) {
            $userrecipes->categories()->attach($request->categories);
        }
        return redirect()->route('welcome');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
