<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Http\Requests\ClienteFormRequest;
use Illuminate\Support\Facades\DB;
use Auth;

// Controlador para cualquier página relacionada con clientes:
class ClientesController extends Controller
{
    // Muestra clientes en el panel de administración
    public function showClientes() {
        $clientes = User::all();
        return view("clientes.show", ["clientes" => $clientes]);
    }

    // Muestra el historial de pedidos de un cliente
    public function showHistorial() {
        $comandas = DB::table("comandas")
                        ->where("idCliente", Auth::user()->id)
                        ->get();

        return view("clientes.historial", ["comandas" => $comandas]);
    }

    // Muestra los detalles de una comanda dentro del historial
    public function showComanda($id) {
        $productos = DB::table("comandas_productos")
                            ->join("productos", "comandas_productos.idProducto", "=", "productos.id")
                            ->where("idComanda", $id)
                            ->where("cantidad", ">", 0)
                            ->select("comandas_productos.*", "productos.nombre")
                            ->get();
        
        return view("clientes.comanda", ["productos" => $productos]);
    }

    // Muestra el formulario para editar un cliente
    public function getEditClientes($id) {
        $cliente = User::findOrFail($id);
        return view("clientes.edit", ["cliente" => $cliente]);
    }

    // Edita un cliente según el formulario anterior
    public function putEditClientes($id, ClienteFormRequest $request) {
        // Validación
        $validator = $request->validated();

        // Sustituimos las propiedades del cliente por los inputs
        $cliente = User::findOrFail($id);
        $cliente->name = $request->input("name");
        $cliente->email = $request->input("email");
        $cliente->telefono = $request->input("telefono");
        $cliente->save();

        // Mensaje de éxito y redirección
        $request->session()->flash("correcto", "Se ha editado el cliente");
        return redirect("/admin/clientes/show");
    }

    // Elimina un cliente
    public function deleteClientes($id, Request $request) {
        $cliente = User::findOrFail($id);
        $cliente->delete();

        $request->session()->flash("correcto", "Se ha borrado el cliente");
        return redirect("/admin/clientes/show");
    }
}
