<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Producto;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\ProductoFormRequest;


class ProductosController extends Controller
{
    // Muestra los productos en la pagina principal
    public function getProductos(Request $request) {
        // Guardamos el rol para saber qué botones mostrar en el navegador
        if (Auth::check()) {
            $id = Auth::user()->id ?? "NOTHING";
            $usuario = User::findOrFail($id);
            $rol = $usuario->rol;
        } else {
            $rol = "NOTHING";
        }

        $texto = trim($request->get("texto")); // Guardamos la búsqueda
        // Mostramos los productos según la búsqueda y paginamos ocho por página
        $productos = DB::table("productos")
                        ->where("nombre", "LIKE", "%" . $texto . "%")
                        ->paginate(8);

        return view('index', compact("productos", "texto", "rol"));
    }

    // Muestra productos en el panel de administración
    public function showProductos() {
        $productos = Producto::all();
        return view("productos.show", ["productos" => $productos]);
    }

    // Muestra el formulario para crear productos
    public function getCreateProductos() {
        return view("productos.create");
    }

    // Crea un producto a partir del formulario anterior
    public function postCreateProductos(ProductoFormRequest $request) {
        $validator = $request->validated();

        // Guardamos la imagen en storage/public
        $request->file("imagen")->store("public");

        $producto = new Producto;
        $producto->nombre = $request->input("nombre");
        $producto->imagen = asset("storage/" . $request->file("imagen")->hashName()); // URL de la imagen en public/storage
        $producto->precio = $request->input("precio");
        $producto->descripcion = $request->input("descripcion");
        $producto->save();

        $request->session()->flash("correcto", "Se ha creado el producto");
        return redirect("/admin/productos/show");
    }

    // Muestra el formulario para editar un producto
    public function getEditProductos($id) {
        $producto = Producto::findOrFail($id);
        return view("productos.edit", ["producto" => $producto]);
    }

    // Edita un producto según el formulario anterior
    public function putEditProductos($id,ProductoFormRequest $request) {
        $validator = $request->validated();

        $producto = Producto::findOrFail($id);
        $producto->nombre = $request->input("nombre");
        $producto->precio = $request->input("precio");
        $producto->descripcion = $request->input("descripcion");
        $producto->save();

        $request->session()->flash("correcto", "Se ha editado el producto");
        return redirect("/admin/productos/show");
    }

    // Muestra el formulario para cambiar la imagen de un producto
    public function getImagen($id) {
        return view("productos.imagen");
    }

    // Cambia la imagen de un producto con id $id según el formulario anterior
    public function putImagen($id, Request $request) {
        $validator = Validator::make($request->all(), ["imagen" => "required|mimes:png,jpg|max:2048"]);
        if ($validator->fails()) {
            return redirect("/admin/comandas/imagen/" . $id)
                    ->withErrors($validator)
                    ->withInput();
        }

        $request->file("imagen")->store("public");

        $producto = Producto::findOrFail($id);
        $producto->imagen = asset("storage/" . $request->file("imagen")->hashName());
        $producto->save();

        $request->session()->flash("correcto", "Se ha cambiado la imagen");
        return redirect("/admin/productos/show");
    }

    // Elimina un producto
    public function deleteProductos($id, Request $request) {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        $request->session()->flash("correcto", "Se ha borrado el producto");
        return redirect("/admin/productos/show");
    }
}
