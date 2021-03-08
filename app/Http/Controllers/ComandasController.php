<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comanda;
use App\Models\User;
use App\Models\Producto;
use App\Models\ComandasProductos;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Auth;

// Controlador que se encarga de todas las páginas relacionadas con las comandas
class ComandasController extends Controller
{
    // Muestra las comandas en el panel de administración
    public function showComandas() {
        $comandas = DB::table("comandas")
                        ->join("users", "comandas.idCliente", "=", "users.id")
                        ->select("comandas.*", "users.name")
                        ->get();

        return view("comandas.show", ["comandas" => $comandas]);
    }

    // Muestra los detalles de una comanda del panel de administración
    public function showComandasId($id) {
        // Mostraremos todos los registros de la tabla pivote que están relacionados
        // con la comanda que tiene la id $id
        $productos = DB::table("comandas_productos")
                            ->join("productos", "comandas_productos.idProducto", "=", "productos.id")
                            ->where("idComanda", $id)
                            ->where("cantidad", ">", 0)
                            ->select("comandas_productos.*", "productos.nombre")
                            ->get();
        
        return view("comandas.showId", ["productos" => $productos, "id" => $id]);
    }

    // Muestra el formulario para crear comandas
    public function getCreateComandas() {
        // Pasamos el rol del usuario para saber qué botones del navegador
        // tenemos que mostrar
        if (Auth::check()) {
            $id = Auth::user()->id ?? "NOTHING";
            $usuario = User::findOrFail($id);
            $rol = $usuario->rol;
        } else {
            $rol = "NOTHING";
        }

        $productos = Producto::all();
        return view('pedido', ["productos" => $productos, "rol" => $rol]);
    }

    // Crea una comanda a partir del formulario anterior
    public function postCreateComandas(Request $request) {
        $precioTotal = 0; // Usaremos esta variable para asignar el precio total de la comanda

        // Guardamos todos los inputs del formulario
        // Eliminamos _method y _token del array
        $inputs = $request->all();
        unset($inputs["_method"]);
        unset($inputs["_token"]);
        $validationArray = [];

        // Generamos la validación para cada input
        foreach ($inputs as $key => $value) {
            $validationArray[$key] = "required|integer|gte:0";
        }

        $validator = Validator::make($request->all(), [$validationArray]);
        if ($validator->fails()) {
            return redirect("/pedido")
                    ->withErrors($validator)
                    ->withInput();
        }

        $comanda = new Comanda;
        $comanda->idCliente = Auth::user()->id; // Asignamos la comanda al cliente que está autenticado al enviar la solicitud
        $comanda->estado = "PEDIDO"; // Al crearse, todas las comandas tienen el estado PEDIDO
        $comanda->precio = 0; // Inicializamos el precio a 0 porque tendremos que calcularlo más tarde
        $comanda->save();

        // Creamos un registro de la tabla pivote por cada producto/input
        foreach ($inputs as $key => $value) {
            $producto = Producto::findOrFail($key);

            $precio = $producto->precio * $value; // Precio del registro = precio del producto * cantidad indicada
            $precioTotal += $precio; // Añadimos el precio del registro al precio total de la comanda

            $pivote = new ComandasProductos;
            $pivote->idComanda = $comanda->id; // Asignamos el registro a la comanda que acabamos de crear
            $pivote->idProducto = $key;
            $pivote->cantidad = $value;
            $pivote->precio = $precio;
            $pivote->save();
        }

        $comanda->precio = $precioTotal; // Acutalizamos la comanda con el precio que hemos calculado dentro del foreach
        $comanda->save();

        $request->session()->flash("correcto", "Se ha realizado su pedido");
        return redirect("/");
    }

    // Muestra el formulario para añadir un producto a una comanda
    public function getCreateSingle($id) {
        $productos = Producto::all(); // Todos los productos que podríamos añadir
        $comandasProductos = ComandasProductos::where("idComanda", $id)->get(); // Productos ya añadidos a la comanda
        $idsProducto = []; // Vamos a guardar todos los ids de los productos que ya tenemos añadidos para que no se muestren en el select

        foreach ($comandasProductos as $key => $comandaProducto) {
            $idsProducto[] = $comandaProducto->idProducto;
        }

        return view("comandas.create-single", ["idsProducto" => $idsProducto, "productos" => $productos]);
    }

    // Añade el producto a la comanda con id $id según el formulario anterior
    public function postCreateSingle($id, Request $request) {
        $validator = Validator::make($request->all(), [
            "idProducto" => "integer|gte:0",
            "cantidad" => "required|integer|gte:0"
        ]);

        if ($validator->fails()) {
            return redirect("/admin/comandas/create/" . $id)
                    ->withErrors($validator)
                    ->withInput();
        }

        $producto = Producto::where("id", $request->input("idProducto"))->firstOrFail();
        $precio = $producto->precio * $request->input("cantidad"); // Calculamos el precio del registro

        $registro = new ComandasProductos;
        $registro->idComanda = $id;
        $registro->idProducto = $request->input("idProducto");
        $registro->cantidad = $request->input("cantidad");
        $registro->precio = $precio;
        $registro->save();

        // Recalculamos el precio total de la comanda tras añadir el nuevo producto
        $this->recalcularPrecioTotal($id);

        $request->session()->flash("correcto", "Se ha añadido el producto a la comanda");
        return redirect("/admin/comandas/show/" . $id);
    }

    // Muestra el formulario para cambiar el estado de una comanda
    public function getEditComandas($id) {
        $comanda = Comanda::findOrFail($id);
        $estados = ["PEDIDO", "PAGADO", "ENTREGADO"]; // Pasamos todos los estados posibles para el select
        return view("comandas.edit", ["comanda" => $comanda, "estados" => $estados]);
    }

    // Edita el estado de una comanda según el formulario anterior
    public function putEditComandas($id, Request $request) {
        $comanda = Comanda::findOrFail($id);
        $comanda->estado = $request->input("estado");
        $comanda->save();

        $request->session()->flash("correcto", "Se ha editado la comanda");
        return redirect("/admin/comandas/show");
    }

    // Muestra el formulario para editar el registro de una comanda
    public function getEditComandasSingle($idComanda, $idProducto) {
        $comanda = DB::table("comandas_productos")
                        ->where("idComanda", $idComanda)
                        ->where("idProducto", $idProducto)
                        ->get();

        return view("comandas.editSingle", ["comanda" => $comanda]);
    }

    // Edita un registro de una comanda según el formulario anterior
    public function putEditComandasSingle($idComanda, $idProducto, Request $request) {
        $producto = Producto::where("id", $idProducto)->firstOrFail();

        $cantidad = $request->input("cantidad");
        $comandaProducto = DB::table("comandas_productos")
                                ->where("idComanda", $idComanda)
                                ->where("idProducto", $idProducto)
                                ->update(["cantidad" => $cantidad, "precio" => $producto->precio * $cantidad]);
                                
        // Recalculamos el precio total de la comanda tras cambiar un registro de la misma
        $this->recalcularPrecioTotal($idComanda);

        $request->session()->flash("correcto", "Se ha editado la comanda");
        return redirect("/admin/comandas/show/" . $idComanda);
    }

    // Elimina una comanda
    public function deleteComandas($id, Request $request) {
        $comanda = Comanda::findOrFail($id);
        $comanda->delete();

        $request->session()->flash("correcto", "Se ha borrado la comanda");
        return redirect("/admin/comandas/show");
    }

    // Elimina el registro de una comanda
    public function deleteComandasSingle($idComanda, $idProducto, Request $request) {
        $comandaSingle = DB::table("comandas_productos")
                                ->where("idComanda", $idComanda)
                                ->where("idProducto", $idProducto)
                                ->delete();

        // Recalcula el precio total de la comanda tras eliminar el registro
        $this->recalcularPrecioTotal($idComanda);

        $request->session()->flash("correcto", "Se ha borrado el producto de la comanda");
        return redirect("/admin/comandas/show/" . $idComanda);
    }

    // Utilidad para recalcular el precio total de la comanda con el id $idComanda
    public function recalcularPrecioTotal($idComanda) {
        $precioTotal = 0;
        $comanda = Comanda::where("id", $idComanda)->firstOrFail();
        $comandasProductos = ComandasProductos::where("idComanda", $idComanda)->get();
        
        foreach ($comandasProductos as $comandaProducto) {
            $precioTotal += $comandaProducto->precio;
        }

        $comanda->precio = $precioTotal;
        $comanda->save();
    }
}
