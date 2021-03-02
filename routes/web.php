<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;

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

Route::view("/", "index");

Auth::routes(["verify" => "true"]);

Route::group(["middleware" => "verified"], function() {
    Route::view("/admin", "admin");

    Route::get("/admin/productos/create", [ProductosController::class, "getCreateProductos"]);
    Route::post("/admin/productos/create", [ProductosController::class, "postCreateProductos"]);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/pedido',function(){
    return view('formulario');
});