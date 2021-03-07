<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ComandasController;
use App\Http\Controllers\HomeController;


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

Route::get('/', [ProductosController::class ,"getProductos"]);
Route::get("/pedido", [ComandasController::class, "getCreateComandas"]);
Route::post("/pedido", [ComandasController::class, "postCreateComandas"]);

Auth::routes(["verify" => "true"]);

Route::group(["middleware" => "verified"], function() {
    Route::group(["middleware" => "admin"], function() {
        Route::view("/admin", "admin");

        //rutas productos
        Route::get("/admin/productos/show", [ProductosController::class, "showProductos"]);
        Route::get("/admin/productos/create", [ProductosController::class, "getCreateProductos"]);
        Route::post("/admin/productos/create", [ProductosController::class, "postCreateProductos"]);
        Route::get("/admin/productos/edit/{id}", [ProductosController::class, "getEditProductos"]);
        Route::put("/admin/productos/edit/{id}", [ProductosController::class, "putEditProductos"]);
        Route::get("/admin/productos/imagen/{id}", [ProductosController::class, "getImagen"]);
        Route::put("/admin/productos/imagen/{id}", [ProductosController::class, "putImagen"]);
        Route::delete("/admin/productos/delete/{id}", [ProductosController::class, "deleteProductos"]);
    
        //rutas clientes
        Route::get("/admin/clientes/show", [ClientesController::class, "showClientes"]);
        Route::get("/admin/clientes/edit/{id}", [ClientesController::class, "getEditClientes"]);
        Route::put("/admin/clientes/edit/{id}", [ClientesController::class, "putEditClientes"]);
        Route::delete("/admin/clientes/delete/{id}", [ClientesController::class, "deleteClientes"]);
    
        //rutas comandas
        Route::get("/admin/comandas/show", [ComandasController::class, "showComandas"]);
        Route::get("/admin/comandas/show/{id}", [ComandasController::class, "showComandasId"]);
        Route::get("/admin/comandas/create/{id}", [ComandasController::class, "getCreateSingle"]);
        Route::post("/admin/comandas/create/{id}", [ComandasController::class, "postCreateSingle"]);
        Route::get("/admin/comandas/edit/{id}", [ComandasController::class, "getEditComandas"]);
        Route::put("/admin/comandas/edit/{id}", [ComandasController::class, "putEditComandas"]);
        Route::get("/admin/comandas/edit/{idComanda}/{idProducto}", [ComandasController::class, "getEditComandasSingle"]);
        Route::put("/admin/comandas/edit/{idComanda}/{idProducto}", [ComandasController::class, "putEditComandasSingle"]);
        Route::delete("/admin/comandas/delete/{id}", [ComandasController::class, "deleteComandas"]);
        Route::delete("/admin/comandas/delete/{idComanda}/{idProducto}", [ComandasController::class, "deleteComandasSingle"]);
    });

    Route::get("/usuario/historial", [ClientesController::class, "showHistorial"]);
    Route::get("/usuario/comanda/{id}", [ClientesController::class, "showComanda"]);
    
    Route::get("/pedido", [ComandasController::class, "getCreateComandas"]);
    Route::post("/pedido", [ComandasController::class, "postCreateComandas"]);
});