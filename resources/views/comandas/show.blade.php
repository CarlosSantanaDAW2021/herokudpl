@extends("layouts.admin-main")
@section("content")
    @if(Session::has("correcto"))
        <div class="alert alert-success">{{Session::get("correcto")}}</div>
    @endif
    
    <table class="table">
        <thead>
            <th scope="col">#</th>
            <th scope="col">Cliente</th>
            <th scope="col">Estado</th>
            <th scope="col">Precio</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
        </thead>

        <tbody>
            @foreach($comandas as $key => $comanda)
                <tr>
                    <th scope="row">{{ $comanda->id }}</th>
                    <td>{{ $comanda->name }}</td>
                    <td>{{ $comanda->estado }}</td>
                    <td>{{ $comanda->precio }}</td>
                    <td><a class="btn btn-info" href="{{url('/admin/comandas/show/' . $comanda->id)}}">Ver detalles</a></td>
                    <td><a class="btn btn-warning" href="{{url('/admin/comandas/edit/' . $comanda->id)}}">Cambiar estado</a></td>
                    <td>
                        <form method="post" action="{{url('/admin/comandas/delete/' . $comanda->id)}}" style="display:inline">
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