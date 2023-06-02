<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;


class Userrecipes extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'ingredients',  'image'];

    public function categories()
{
    return $this->belongsToMany(Categories::class);
}

}
