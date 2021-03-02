<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class ClientesController extends Controller
{
    // Mostrar clientes en admin
    public function showClientes() {
        $clientes = User::all();
        return view("clientes.show", ["clientes" => $clientes]);
    }

    // Mostrar formulario para editar cliente
    public function getEditClientes($id) {
        $cliente = User::findOrFail($id);
        return view("clientes.edit", ["cliente" => $cliente]);
    }

    // Editar un cliente según el formulario anterior
    public function putEditClientes($id, Request $request) {
        $validator = Validator::make($request->all(), [
            "name" => "required|string|max:255",
            "email" => "required|email|max:255",
            "telefono" => "required|digits:9"
        ]);

        if ($validator->fails()) {
            return redirect("/admin/clientes/edit/" . $id)
                    ->withErrors($validator)
                    ->withInput();
        }

        $cliente = User::findOrFail($id);
        $cliente->name = $request->input("name");
        $cliente->email = $request->input("email");
        $cliente->telefono = $request->input("telefono");
        $cliente->save();

        $request->session()->flash("correcto", "Se ha editado el cliente");
        return redirect("/admin/clientes/show");
    }

    // Eliminar un cliente
    public function deleteClientes($id, Request $request) {
        $cliente = User::findOrFail($id);
        $cliente->delete();

        $request->session()->flash("correcto", "Se ha borrado el cliente");
        return redirect("/admin/clientes/show");
    }
}
