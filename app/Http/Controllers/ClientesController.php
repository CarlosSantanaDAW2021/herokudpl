<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientesController extends Controller
{
    // Mostrar clientes en admin
    public function showClientes() {
        $clientes = Producto::all();
        return view("clientes.show", ["clientes" => $clientes]);
    }

    // Mostrar formulario para editar producto
    // TODO: modificar vista para que muestre la imagen
    public function getEditclientes($id) {
        $producto = Producto::findOrFail($id);
        return view("clientes.edit", ["producto" => $producto]);
    }

    // Editar un producto según el formulario anterior
    public function putEditclientes($id, Request $request) {
        $validator = Validator::make($request->all(), [
            "nombre" => "required|string|max:255",
            "imagen" => "required|mimes:png,jpg|max:2048",
            "precio" => "required|numeric|gte:0"
        ]);

        if ($validator->fails()) {
            return redirect("/admin/clientes/edit/" . $id)
                    ->withErrors($validator)
                    ->withInput();
        }

        $request->file("imagen")->store("public");

        $producto = Producto::findOrFail($id);
        $producto->nombre = $request->input("nombre");
        $producto->imagen = asset("storage/" . $request->file("imagen")->hashName());
        $producto->precio = $request->input("precio");
        $producto->save();

        $request->session()->flash("correcto", "Se ha editado el producto");
        return redirect("/admin/clientes/show");
    }

    // Eliminar un producto
    public function deleteclientes($id, Request $request) {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        $request->session()->flash("correcto", "Se ha borrado el producto");
        return redirect("/admin/clientes/show");
    }
}
