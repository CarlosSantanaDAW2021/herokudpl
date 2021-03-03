<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comanda;
use Illuminate\Support\Facades\Validator;

class ComandasController extends Controller
{
    public function showComandas() {
        $comandas = Comanda::all();
        return view("comandas.show", ["comandas" => $comandas]);
    }

    // TODO: Muestra el formulario para crear comandas
    public function getCreateComandas() {
        
    }

    // TODO: Crea una comanda a partir del formulario anterior
    public function postCreatecomandas(Request $request) {
        
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
            return redirect("/admin/comandas/edit/" . $id)
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
        return redirect("/admin/comandas/show");
    }

    // Eliminar una comanda
    public function deleteComandas($id, Request $request) {
        $comanda = Comanda::findOrFail($id);
        $comanda->delete();

        $request->session()->flash("correcto", "Se ha borrado la comanda");
        return redirect("/admin/comandas/show");
    }
}
