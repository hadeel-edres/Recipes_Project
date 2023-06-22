<?php

namespace App\Http\Controllers;
use App\Models\Userrecipes;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Http\Requests\WelcomeRecipesStoreRequest;
use App\Models\Recipes;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


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
            'user_id' => $request->user()->id
           
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
    public function edit($user_id, $userrecipe)
    {
        $categories = Categories::all();
        $user = User::findOrFail($user_id);
        $userrecipe= Userrecipes::findOrFail($userrecipe);

        // Überprüfe, ob der Benutzer eingeloggt ist.
    if (!Auth::check()) {
        // Weiterleitung zur Login-Seite.
        return Redirect::route('login');
    }

    // Überprüfe, ob der Benutzer die erforderliche Berechtigung hat
    $loggedInUser = Auth::user();
    if ($loggedInUser->id !== $user->id && $loggedInUser->id !== 1) {
        // Weiterleitung zur 404-Fehlerseite
        abort(404);
    }
        return view('user.edit', compact('userrecipe', 'categories', 'user'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $user_id, $userrecipe)
{
    $user_recipe= Userrecipes::findOrFail($userrecipe);
    $request->validate([
        'name' => 'required',
        'description' => 'required',
        'ingredients' => 'required',
        'steps' => 'required',
    ]);

    $image = $user_recipe->image;

    if ($request->hasFile('image')) {
        if (!empty($image)) {
            Storage::delete($image);
        }

        $image = $request->file('image')->store('public/userrecipes');
    }

    $user_recipe->update([
        'name' => $request->name,
        'description' => $request->description,
        'ingredients' => $request->ingredients,
        'steps' => $request->steps,
        'image' => $image,
    ]);

    if ($request->has('categories')) {
        $user_recipe->categories()->sync($request->categories);
    }

    return redirect()->route('welcome');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($user_id, $userrecipe)
{
    $userrecipe = UserRecipes::findOrFail($userrecipe);
    // Manuell abhängige Einträge löschen
    $userrecipe->categories()->detach();
    Storage::delete($userrecipe->image);
    $userrecipe->delete();
    
    return redirect()->route('welcome');
}


}
