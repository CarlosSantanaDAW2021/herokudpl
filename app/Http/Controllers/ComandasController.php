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
        $comandas = Comanda::all();
        return view("comandas.show", ["comandas" => $comandas]);
    }

    public function showComandasId($id) {
        $productos = DB::table("comandas_productos")
                            ->where("idComanda", $id)
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
        $comanda->save();
        foreach ($inputs as $key => $value) {
            $pivote = new ComandasProductos;
            $pivote->idComanda = $comanda->id;
            $pivote->idProducto = $key;
            $pivote->cantidad = $value;
            $pivote->save();
        }
    }

    // Mostrar formulario para editar comanda
    public function getEditComandas($id) {
        $comanda = Comanda::findOrFail($id);
        return view("comandas.edit", ["comanda" => $comanda]);
    }

    // Editar una comanda según el formulario anterior
    public function putEditComandas($id, Request $request) {
        $validator = Validator::make($request->all(), [
            "nombre" => "required|string|max:255",
            "imagen" => "required|mimes:png,jpg|max:2048", 
            "precio" => "required|numeric|gte:0"
        ]);

        if ($validator->fails()) {
            return redirect("/comandas/edit/" . $id)
                    ->withErrors($validator)
                    ->withInput();
        }

        $request->file("imagen")->store("public");

        $comanda = comanda::findOrFail($id);
        $comanda->nombre = $request->input("nombre");
        $comanda->imagen = asset("storage/" . $request->file("imagen")->hashName());
        $comanda->precio = $request->input("precio");
        $comanda->save();

        $request->session()->flash("correcto", "Se ha editado la comanda");
        return redirect("/comandas/show");
    }

    // Eliminar una comanda
    public function deleteComandas($id, Request $request) {
        $comanda = Comanda::findOrFail($id);
        $comanda->delete();

        $request->session()->flash("correcto", "Se ha borrado la comanda");
        return redirect("/admin/comandas/show");
    }

    public function deleteComandasSingle($idComanda, $idProducto, Request $request) {
        $comandaSingle = DB::table("comandas_productos")
                                ->where("idComanda", $idComanda)
                                ->where("idProducto", $idProducto)
                                ->delete();

        $request->session()->flash("correcto", "Se ha borrado el producto de la comanda");
        return redirect("/admin/comandas/show/" . $idComanda);
    }
}
