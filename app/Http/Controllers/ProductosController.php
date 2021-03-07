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
<<<<<<< HEAD
    // mostrar productos en pagina principal
    public function getProductos() {
        
        $producto = DB::table('productos')->get(); 
        return view('index',['productos'=> DB::table('productos')->paginate(8)],["productos" => $producto]);   
    }

    //controlador para la busqueda
    public function getBusqueda(Request $request){
        $input = trim($request->get('texto'));
        if($input){
            $productos = DB::table('productos')
                ->select()
                ->where("nombre", "LIKE", "%.$input.%")
                ->get();
        
        return view('busqueda',["producto"=>$productos])->with('buscar', $productos);
        }
        else{
            return view('busqueda');
=======
    // Mostrar productos en pagina principal
    public function getProductos(Request $request) {
        if (Auth::check()) {
            $id = Auth::user()->id ?? "NOTHING";
            $usuario = User::findOrFail($id);
            $rol = $usuario->rol;
        } else {
            $rol = "NOTHING";
>>>>>>> 37500d8f01c7e2ed5705628d7a980adeb5141380
        }

        $texto = trim($request->get("texto"));
        $productos = DB::table("productos")
                        ->where("nombre", "LIKE", "%" . $texto . "%")
                        ->paginate(8);

        return view('index', compact("productos", "texto", "rol"));
    }

    // Mostrar productos en admin
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

        $request->file("imagen")->store("public");

        $producto = new Producto;
        $producto->nombre = $request->input("nombre");
        $producto->imagen = asset("storage/" . $request->file("imagen")->hashName());
        $producto->precio = $request->input("precio");
        $producto->descripcion = $request->input("descripcion");
        $producto->save();

        $request->session()->flash("correcto", "Se ha creado el producto");
        return redirect("/admin/productos/show");
    }

    // Mostrar formulario para editar producto
    // TODO: modificar vista para que muestre la imagen
    public function getEditProductos($id) {
        $producto = Producto::findOrFail($id);
        return view("productos.edit", ["producto" => $producto]);
    }

    // Editar un producto según el formulario anterior
    public function putEditProductos($id,ProductoFormRequest $request) {
        $validator = $request->validated();
        $request->file("imagen")->store("public");

        $producto = Producto::findOrFail($id);
        $producto->nombre = $request->input("nombre");
        $producto->imagen = asset("storage/" . $request->file("imagen")->hashName());
        $producto->precio = $request->input("precio");
        $producto->descripcion = $request->input("descripcion");
        $producto->save();

        $request->session()->flash("correcto", "Se ha editado el producto");
        return redirect("/admin/productos/show");
    }

    // Eliminar un producto
    public function deleteProductos($id, Request $request) {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        $request->session()->flash("correcto", "Se ha borrado el producto");
        return redirect("/admin/productos/show");
    }
}
