@extends("layouts.main")
@section("content")
<!-- Page Content -->

<div class="container" >

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