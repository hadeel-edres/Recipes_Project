<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\RecipesController;
use App\Http\Controllers\Admin\CategoriesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserFront\RecipesController as UserFrontRecipesController;
use App\Http\Controllers\UserFront\CategoriesController as UserFrontCategoriesController;
use App\Http\Controllers\WelcomeRecipesController;
use App\Http\Controllers\UserFront\WelcomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Startseite Route (Für welcome.blade.php).
Route::get('/rec.ipe', [WelcomeRecipesController::class, 'welcomeRecipes'])->name('welcome');

// Navigation: Rezepte nach Mahlzeit Routes.
Route::get('/categories', [UserFrontCategoriesController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}', [UserFrontCategoriesController::class, 'show'])->name('categories.show');
Route::get('/recipeshow/{category}/{id}', [UserFrontCategoriesController::class, 'recipeshow'])->name('categories.recipeshow');


// User Rezepte hinzufügen Routes.
Route::get('/creatrecipe', [WelcomeRecipesController::class, 'creatrecipe'])->name('recipes.creat');
Route::post('/creatrecipe', [WelcomeRecipesController::class, 'store'])->name('recipes.store');
Route::get('/user_recipe/{user_id}/{id}', [WelcomeRecipesController::class, 'show'])->name('user.show');
Route::get('/user_recipe_edit/{user_id}/{userrecipe}', [WelcomeRecipesController::class, 'edit'])->name('user.edit');
Route::put('/user_recipe_edit/{user_id}/{userrecipe}', [WelcomeRecipesController::class, 'update'])->name('user.update');
Route::delete('/user_recipe_edit/{user_id}/{userrecipe}', [WelcomeRecipesController::class, 'destroy'])->name('user.destroy');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Page Routes
Route::middleware(['auth', 'admin'])->name('admin.')->prefix('admin')->group(function(){
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::resource('/recipes', RecipesController::class);
    Route::resource('/categories', CategoriesController::class);

});

require __DIR__.'/auth.php';
