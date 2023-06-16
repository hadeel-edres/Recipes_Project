<?php

namespace App\Http\Controllers;
use App\Models\Userrecipes;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Http\Requests\WelcomeRecipesStoreRequest;
use App\Models\Recipes;
use Illuminate\Support\Facades\Storage;
use App\Models\User;


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
            'steps' => $request->steps,
            'image' => $image,
            'user_id' => $request->user_id
           
        ]);

        if ($request->has('categories')) {
            $userrecipes->categories()->attach($request->categories);
        }
        return redirect()->route('welcome');

    }

    /**
     * Display the specified resource.
     */
    public function show($user_id, $id)
{
    $recipe = Userrecipes::findOrFail($id);
    $user = User::findOrFail($user_id);

    return view("user.show", compact("recipe", "user"));
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Userrecipes $userrecipe)
    {
        $categories = Categories::all();
        return view('user.edit', compact('userrecipe', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Userrecipes $userrecipe)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'ingredients'=>'required',
            'steps'=>'required',
            'user_id'=>'required'
        ]);
        $image= $userrecipe->image;
        if($request->hasFile('image')){
            Storage::delete($userrecipe->image);
            $image= $request->file('image')->store('public/userrecipes');
        }
        $userrecipe->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'ingredients'=>$request->ingredients,
            'steps'=>$request->steps,
            'image'=>$image,
            'user_id' => $request->user_id
        ]);
        if ($request->has('categories')) {
            $userrecipe->categories()->sync($request->categories);
        }
        return redirect()->route('welcome');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Userrecipes $userrecipe)
    {
        Storage::delete($userrecipe->image);
        $userrecipe->delete();
        return redirect()->route('welcome');
    }
}
