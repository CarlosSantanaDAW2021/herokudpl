<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ComandasController;

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
Route::get("/pedido", [ComandasController::class, "getCreateComandas"]);
Route::post("/pedido", [ComandasController::class, "postCreateComandas"]);

Auth::routes(["verify" => "true"]);

Route::group(["middleware" => "verified"], function() {
    Route::view("/admin", "admin");

    //rutas productos
    Route::get("/admin/productos/show", [ProductosController::class, "showProductos"]);
    Route::get("/admin/productos/create", [ProductosController::class, "getCreateProductos"]);
    Route::post("/admin/productos/create", [ProductosController::class, "postCreateProductos"]);
    Route::get("/admin/productos/edit/{id}", [ProductosController::class, "getEditProductos"]);
    Route::put("/admin/productos/edit/{id}", [ProductosController::class, "putEditProductos"]);
    Route::delete("/admin/productos/delete/{id}", [ProductosController::class, "deleteProductos"]);

    //rutas clientes
    Route::get("/admin/clientes/show", [ClientesController::class, "showClientes"]);
    Route::get("/admin/clientes/edit/{id}", [ClientesController::class, "getEditClientes"]);
    Route::put("/admin/clientes/edit/{id}", [ClientesController::class, "putEditClientes"]);
    Route::delete("/admin/clientes/delete/{id}", [ClientesController::class, "deleteClientes"]);

    Route::get("/admin/comandas/show", [ComandasController::class, "showComandas"]);
});