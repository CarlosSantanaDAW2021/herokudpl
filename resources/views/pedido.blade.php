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

@section("content")
    <h1 class="h1pedido">Realizar un pedido</h1>
    <div class="row" style="margin-top:40px">
        <div class="offset-md-3 col-md-6">
            <div class="card" id="comanda">
                <div class="card-header text-center">
                    Crear comanda
                </div>
                
                <div class="card-body" style="padding:30px">
                    <form method="post">
                        @method("POST")
                        @csrf
                        
                        @foreach($productos as $key => $producto)
                            @include("partials.input-comanda")
                        @endforeach
                    
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                                Realizar pedido
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop