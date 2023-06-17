<?php

namespace App\Http\Controllers\UserFront;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recipes;
use App\Models\Categories;
use App\Http\Requests\RecipesStoreRequest;

class RecipesController extends Controller
{

    public function index()
    {
        $recipes= Recipes::all();
        return view('welcome', compact('recipes'));
    }
    
}
