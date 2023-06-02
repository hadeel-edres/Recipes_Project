<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Userrecipes;

class categories extends Model
{
    use HasFactory;
    protected $fillable= ['name', 'image', 'description'];

    // Funktion to make the Relationship between Recipes and Categories.
    public function recipes()
    {
        return $this->belongsToMany(Recipes::class, 'categories_recipes');
    }
    // Funktion to make the Relationship between Userrecipes and Categories.
    public function userrecipes()
    {
        return $this->belongsToMany(Userrecipes::class, 'categories_recipes');
    }
}
