@extends("layouts.admin-main")

@section("panel-admin")
    @include("partials.panel-admin")
@stop

@section("mostrar-ocultar")
    @include("partials.mostrar-ocultar")
@stop

@section("content")
    @if(Session::has("correcto"))
        <div class="alert alert-success">{{Session::get("correcto")}}</div>
    @endif
    
    <a class="btn btn-success" href="{{ url('/admin/comandas/create/' . $id) }}">Añadir producto</a>
    <table class="table">
        <thead>
            <th scope="col">Producto</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Precio</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </thead>

        <tbody>
            @foreach($productos as $key => $producto)
                <tr>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->cantidad }}</td>
                    <td>{{ $producto->precio }}</td>
                    <td><a class="btn btn-warning" href="{{url('/admin/comandas/edit/' . $producto->idComanda . '/' . $producto->idProducto)}}">Editar</a></td>
                    <td><a class="btn btn-danger" data-target="#delete-{{ $producto->idComanda }}-{{ $producto->idProducto }}" data-toggle="modal">Eliminar</a></td>
                    @include("comandas.delete-single-modal")
                </tr>
            @endforeach
        </tbody>
    </table>
@stop