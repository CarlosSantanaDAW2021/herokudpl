@extends("layouts.admin-main")
@section("content")
    @if(Session::has("correcto"))
        <div class="alert alert-success">{{Session::get("correcto")}}</div>
    @endif
    
    <table class="table">
        <thead>
            <th scope="col">#</th>
            <th scope="col">Estado</th>
            <th scope="col">Precio</th>
            <th scope="col"></th>
        </thead>

        <tbody>
            @foreach($comandas as $key => $comanda)
                <tr>
                    <th scope="row">{{ $comanda->id }}</th>
                    <td>{{ $comanda->estado }}</td>
                    <td>{{ $comanda->precio }}</td>
                    <td><a class="btn btn-info" href="{{url('/usuario/comanda/' . $comanda->id)}}">Ver detalles</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop