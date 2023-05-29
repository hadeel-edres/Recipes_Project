<?php

namespace App\Http\Controllers\UserFront;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Recipes;

class WelcomeController extends Controller
{
    public function index()
    {
        $specials = Categories::where('name', 'specials')->first();
    
        return view('welcome', compact('specials'));
    }
}
