<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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
        Route::get('/', function () {
            return view('admin.dashboard');
        });
        Route::get('/user', function () {
            // return view('admin.dashboard');
        })->name('user');
        Route::get('/recipe', function () {
            // return view('admin.dashboard');
        })->name('recipe');
    });
    Route::prefix('/')->group(function () {
        Route::get('/', function () {
            return view('clients.index');
        });
        Route::get('/danh-sach', function () {
            // return view('admin.dashboard');
        })->name('list');
        Route::get('/tim-kiem', function () {
            // return view('admin.dashboard');
        })->name('search');
    });
});
