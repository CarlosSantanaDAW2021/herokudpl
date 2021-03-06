@extends("layouts.main")

@section("links-roles")
  @if ($rol == "ADMIN")
  <li class="nav-item">
    <a class="nav-link" href="/admin">{{ __('Panel de administración') }}</a>
  </li>
  @endif

  @if ($rol == "CLIENTE" || $rol == "ADMIN")
  <li class="nav-item">
    <a class="nav-link" href="/usuario/historial">{{ __('Mi historial') }}</a>
  </li>
  @endif
@stop

@section("busqueda")
  <form class="form-inline" action="{{ url('/') }}" method="GET">
    <input type="search" class="form-control" name="texto" id="texto" placeholder="Buscar producto..." value="{{ $texto }}">
    <button class="btn btn-primary" type="submit">Buscar</button>
  </form>
@stop

@section("content")
<!-- Page Content -->
<div class="container" >
  @if ($errors->any())
    <div class="row justify-content-center" style="margin-top:40px">
        <div class="col-sm-7">
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
  @endif
  
  @if(Session::has("correcto"))
      <div class="alert alert-success">{{Session::get("correcto")}}</div>
  @endif

  <!-- Jumbotron Header -->
  <header class="jumbotron my-3">
    <h1 class="display-3">Bienvenido a la página de la cafetería del centro majada marcial</h1>
    <p class="lead">Realiza tu pedido sin necesidad de esperar largas colas </p>
    <a href="{{url('/pedido')}}" class="btn btn-primary btn-lg">Haz tu pedido</a>
  </header>

  <!-- Page Features -->
  
  <div class="row">
 @foreach( $productos as $key => $producto )
    <div class="col-4 col-md-3 mb-4">
      <div class="card h-100">
        <img class="card-img-top" src="{{$producto->imagen}}" alt="">
        <div class="card-body">
          <h4 class="card-title">{{$producto->nombre}}</h4>
          <p class="card-text">{{$producto->descripcion}}</p>
        </div>
      </div>
    </div>
    @endforeach
  </div>  
  {{$productos = DB::table('productos')->simplePaginate(8)}}
  <br>
</div>
<!-- /.container -->
@stop