@extends("layouts.admin-main")
@section("content")
    @if(Session::has("correcto"))
        <div class="alert alert-success">{{Session::get("correcto")}}</div>
    @endif
    
    <table class="table">
        <thead>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Email</th>
            <th scope="col">Teléfono</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </thead>

        <tbody>
            @foreach($clientes as $key => $cliente)
                <tr>
                    <th scope="row">{{ $cliente->id }}</th>
                    <td>{{ $cliente->name }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td>{{ $cliente->telefono }}</td>
                    <td><a class="btn btn-warning" href="{{url('/admin/clientes/edit/' . $cliente->id)}}">Editar</a></td>
                    <td><a class="btn btn-danger" data-target="#delete-{{ $cliente->id }}" data-toggle="modal">Eliminar</a></td>
                    @include("clientes.delete-modal")
                </tr>
            @endforeach
        </tbody>
    </table>
@stop