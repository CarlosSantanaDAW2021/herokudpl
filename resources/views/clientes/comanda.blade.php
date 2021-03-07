@extends("layouts.admin-main")
@section("content")
    @if(Session::has("correcto"))
        <div class="alert alert-success">{{Session::get("correcto")}}</div>
    @endif
    
    <table class="table">
        <thead>
            <th scope="col">Producto</th>
            <th scope="col">Cantidad</th>
        </thead>

        <tbody>
            @foreach($productos as $key => $producto)
                <tr>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->cantidad }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop