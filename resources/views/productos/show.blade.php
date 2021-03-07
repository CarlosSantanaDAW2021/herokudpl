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
    
    <table class="table">
        <thead>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Imagen</th>
            <th scope="col">Precio</th>
            <th scope="col">Descripción</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
        </thead>

        <tbody>
            @foreach($productos as $key => $producto)
                <tr>
                    <th scope="row">{{ $producto->id }}</th>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->imagen }}</td>
                    <td>{{ $producto->precio }}</td>
                    <td>{{ $producto->descripcion }}</td>
                    <td><a class="btn btn-warning" href="{{url('/admin/productos/edit/' . $producto->id)}}">Editar</a></td>
                    <td><a class="btn btn-warning" href="{{url('/admin/productos/imagen/' . $producto->id)}}">Cambiar imagen</a></td>
                    <td><a class="btn btn-danger" data-target="#delete-{{ $producto->id }}" data-toggle="modal">Eliminar</a></td>
                    @include("productos.delete-modal")
                </tr>
            @endforeach
        </tbody>
    </table>
@stop