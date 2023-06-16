<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;


class Userrecipes extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'ingredients', 'steps', 'image', 'user_id'];

    public function categories()
{
    return $this->belongsToMany(Categories::class);
}

public function user()
{
    return $this->belongsTo(User::class);
}


}
