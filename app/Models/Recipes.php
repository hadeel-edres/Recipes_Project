<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recipes extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'ingredients',  'image'];

    // Funktion to make the Relationship between Recipes and Categories.
    public function categories()
    {
        return $this->belongsToMany(Categories::class, 'categories_recipes');
    }
}
