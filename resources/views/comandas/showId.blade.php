@extends("layouts.admin-main")
@section("content")
    @if(Session::has("correcto"))
        <div class="alert alert-success">{{Session::get("correcto")}}</div>
    @endif
    
    <table class="table">
        <thead>
            <th scope="col">Producto</th>
            <th scope="col">Cantidad</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </thead>

        <tbody>
            @foreach($productos as $key => $producto)
                <tr>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->cantidad }}</td>
                    <td><a class="btn btn-warning" href="{{url('/admin/comandas/edit/' . $producto->idComanda . '/' . $producto->idProducto)}}">Editar</a></td>
                    <td>
                        <form method="post" action="{{url('/admin/comandas/delete/' . $producto->idComanda . '/' . $producto->idProducto)}}" style="display:inline">
                            @method("DELETE")
                            @csrf
                            <button type="submit" class="btn btn-danger" role="button">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop