<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProdctControllers;
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

Route::get('/login', function () {
    return view('login');
});

Route::get('/logout', function () {
    Session::forget('user');
    return redirect('login');
});

// Route::get('/', function () {
//     return view('product/product');
// });

Route::Get('/','ProdctController@index');

Route::post("/login",[UserController::class,'login']);
// Route::get("/",[ProductController::class,'index']);

Route::resource('product',ProdctController::class);

Route::get('search','ProdctController@search');
// Route::get("search",[ProdctController::class,'search']);

Route::Post('add_to_cart','ProdctController@addToCart');