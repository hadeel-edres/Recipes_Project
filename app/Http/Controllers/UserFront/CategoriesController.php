<?php

namespace App\Http\Controllers\UserFront;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Recipes;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Categories::all();
        return view('categories.index', compact('categories'));
    }

    public function show(Categories $category)
    {
        return view('categories.show', compact('category'));
    }

    public function recipeshow(Categories $category)
{
    $recipe = $category->recipes->first();
    
    if ($recipe) {
        return view('categories.recipeshow', compact('recipe'));
    } else {
        return view('categories.recipeshow')->with('recipe', null);
    }
}

    

    
}
