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

class ComandasController extends Controller
{
    public function showComandas() {
        $comandas = DB::table("comandas")
                        ->join("users", "comandas.idCliente", "=", "users.id")
                        ->select("comandas.*", "users.name")
                        ->get();

        return view("comandas.show", ["comandas" => $comandas]);
    }

    public function showComandasId($id) {
        $productos = DB::table("comandas_productos")
                            ->where("idComanda", $id)
                            ->join("productos", "comandas_productos.idProducto", "=", "productos.id")
                            ->select("comandas_productos.*", "productos.nombre")
                            ->get();
        
        return view("comandas.showId", ["productos" => $productos]);
    }

    // Muestra el formulario para crear comandas
    public function getCreateComandas() {
        $productos = Producto::all();
        return view('pedido', ["productos" => $productos]);
    }

    // Crea una comanda a partir del formulario anterior
    public function postCreateComandas(Request $request) {
        $precioTotal = 0;

        $inputs = $request->all();
        unset($inputs["_method"]);
        unset($inputs["_token"]);
        $validationArray = [];

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
        $comanda->idCliente = Auth::user()->id;
        $comanda->estado = "PEDIDO";
        $comanda->precio = 0;
        $comanda->save();

        foreach ($inputs as $key => $value) {
            $precioProducto = Producto::findOrFail($key);

            $precio = $precioProducto["precio"] * $value;
            $precioTotal += $precio;

            $pivote = new ComandasProductos;
            $pivote->idComanda = $comanda->id;
            $pivote->idProducto = $key;
            $pivote->cantidad = $value;
            $pivote->precio = $precio;
            $pivote->save();
        }

        $comanda->precio = $precioTotal;
        $comanda->save();

        $request->session()->flash("correcto", "Se ha realizado su pedido");
        return redirect("/");
    }

    // Mostrar formulario para editar comanda
    public function getEditComandas($id) {
        $comanda = Comanda::findOrFail($id);
        $estados = ["PEDIDO", "PAGADO", "ENTREGADO"];
        return view("comandas.edit", ["comanda" => $comanda, "estados" => $estados]);
    }

    // Editar una comanda según el formulario anterior
    public function putEditComandas($id, Request $request) {
        $comanda = Comanda::findOrFail($id);
        $comanda->estado = $request->input("estado");
        $comanda->save();

        $request->session()->flash("correcto", "Se ha editado la comanda");
        return redirect("/admin/comandas/show");
    }

    // Mostrar formulario para editar registro de comanda
    public function getEditComandasSingle($idComanda, $idProducto) {
        $comanda = DB::table("comandas_productos")
                        ->where("idComanda", $idComanda)
                        ->where("idProducto", $idProducto)
                        ->get();

        return view("comandas.editSingle", ["comanda" => $comanda]);
    }

    // Editar una comanda según el formulario anterior
    public function putEditComandasSingle($idComanda, $idProducto, Request $request) {
        $precioTotal = 0;
        $producto = Producto::where("id", $idProducto)->firstOrFail();
        $comanda = Comanda::where("id", $idComanda)->firstOrFail();

        $cantidad = $request->input("cantidad");
        $comandaProducto = DB::table("comandas_productos")
                                ->where("idComanda", $idComanda)
                                ->where("idProducto", $idProducto)
                                ->update(["cantidad" => $cantidad, "precio" => $producto->precio * $cantidad]);

        $comandasProductos = ComandasProductos::where("idComanda", $idComanda)->get();
        foreach ($comandasProductos as $precio) {
            $precioTotal += $precio->precio;
        }

        $comanda->precio = $precioTotal;
        $comanda->save();

        $request->session()->flash("correcto", "Se ha editado la comanda");
        return redirect("/admin/comandas/show/" . $idComanda);
    }

    // Eliminar una comanda
    public function deleteComandas($id, Request $request) {
        $comanda = Comanda::findOrFail($id);
        $comanda->delete();

        $request->session()->flash("correcto", "Se ha borrado la comanda");
        return redirect("/admin/comandas/show");
    }

    public function deleteComandasSingle($idComanda, $idProducto, Request $request) {
        $precioTotal = 0;
        $comanda = Comanda::where("id", $idComanda)->firstOrFail();

        $comandaSingle = DB::table("comandas_productos")
                                ->where("idComanda", $idComanda)
                                ->where("idProducto", $idProducto)
                                ->delete();

        $comandasProductos = ComandasProductos::where("idComanda", $idComanda)->get();
        foreach ($comandasProductos as $precio) {
            $precioTotal += $precio->precio;
        }

        $comanda->precio = $precioTotal;
        $comanda->save();

        $request->session()->flash("correcto", "Se ha borrado el producto de la comanda");
        return redirect("/admin/comandas/show/" . $idComanda);
    }
}
