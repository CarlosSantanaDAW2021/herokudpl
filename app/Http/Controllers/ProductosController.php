<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\Validator;

class ProductosController extends Controller
{
    // TODO: mostrar productos en pagina principal
    public function getProductos() {

    }

    // TODO: mostrar productos en admin (podria juntarse con getProductos)
    public function showProductos() {

    }

    // Muestra el formulario para crear productos
    public function getCreateProductos() {
        return view("productos.create");
    }

    // Crea un producto a partir del formulario anterior
    public function postCreateProductos(Request $request) {
        $validator = Validator::make($request->all(), [
            "nombre" => "required|string|max:255",
            "imagen" => "required|mimes:png,jpg|max:2048",
            "precio" => "required|numeric|gte:0"
        ]);

        if ($validator->fails()) {
            return redirect("/admin/productos/create")
                    ->withErrors($validator)
                    ->withInput();
        }

        $request->file("imagen")->store("public");

        $producto = new Producto;
        $producto->nombre = $request->input("nombre");
        $producto->imagen = asset("storage/" . $request->file("imagen")->hashName());
        $producto->precio = $request->input("precio");
        $producto->save();

        $request->session()->flash("correcto", "Se ha creado el producto");
        return redirect("/admin");
    }

    // TODO: mostrar formulario para editar producto
    public function getEditProductos() {

    }

    // TODO: editar un producto según el formulario anterior
    public function putEditProductos() {

    }

    // TODO: eliminar un producto
    public function deleteProductos() {

    }
}
