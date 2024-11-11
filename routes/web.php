<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\SearchController;
use PHPUnit\TextUI\XmlConfiguration\Group;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/register', [AuthController::class, 'showRegistrationForm']);
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'showLoginForm']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'admin', 'middleware' => ['auth.admin']], function () {
        Route::get('/', [AdminController::class, 'showUserDashBoard']);
        Route::get('/user', [AdminController::class, 'showUserDashBoard'])->name('user');
        Route::get('/recipe', [AdminController::class, 'showRecipeDashBoard'])->name('recipe');
        Route::get('/add-recipe', [RecipeController::class, 'create'])->name('recipe.add');
        Route::post('/store-recipe', [RecipeController::class, 'store'])->name('recipe.store');
        Route::get('/edit-recipe/{id}/edit', [RecipeController::class, 'edit'])->name('recipe.edit');
        Route::put('/edit-recipe/{id}', [RecipeController::class, 'update'])->name('recipe.update');
        Route::delete('/destroy-recipe/{id}', [RecipeController::class, 'destroy'])->name('recipe.delete');
    });
});
Route::prefix('/')->group(function () {
    Route::get('/', [ClientController::class, 'dashboard'])->name('dashboard');
    Route::get('/recipe', [ClientController::class, 'dashboard'])->name('list');
    Route::get('/tim-kiem', [ClientController::class, 'dashboard'])->name('search');
    Route::get('/chi-tiet/{id}/{title}', [RecipeController::class, 'show'])->name('client.detail');
    Route::get('/add-recipe', [RecipeController::class, 'create'])->name('client.add');
    Route::post('/store-recipe', [RecipeController::class, 'store'])->name('client.store');
    Route::get('/edit-recipe/{id}/edit', [RecipeController::class, 'edit'])->name('client.edit');
    Route::put('/edit-recipe/{id}', [RecipeController::class, 'update'])->name('client.update');
});
