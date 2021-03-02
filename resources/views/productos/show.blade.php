@extends("layouts.admin-main")
@section("content")
    <table class="table">
        <thead>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Imagen</th>
            <th scope="col">Precio</th>
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
                    <td><a class="btn btn-warning" href="{{url('/admin/productos/edit/' . $producto->id)}}">Editar</a></td>
                    <td><a class="btn btn-danger" href="{{url('/admin/productos/delete/' . $producto->id)}}">Eliminar</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop