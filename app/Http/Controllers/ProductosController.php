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
        $productos = Producto::all();
        return view("productos.show", ["productos" => $productos]);
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
        $producto = Producto::findOrFail($id);
        return view("productos.edit", ["producto" => $producto]);
    }

    // TODO: editar un producto según el formulario anterior
    public function putEditProductos() {
        $request->file("imagen")->store("public");

        $producto = Producto::findOrFail($id);
        $producto->nombre = $request->input("nombre");
        $producto->imagen = asset("storage/" . $request->file("imagen")->hashName());
        $producto->precio = $request->input("precio");
        $producto->save();

        $request->session()->flash("correcto", "Se ha editado el producto");
        return redirect("/admin");
    }

    // TODO: eliminar un producto
    public function deleteProductos() {

    }
}
