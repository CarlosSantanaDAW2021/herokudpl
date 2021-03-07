@extends("layouts.admin-main")

@section("panel-admin")
    @include("partials.panel-admin")
@stop

@section("mostrar-ocultar")
    @include("partials.mostrar-ocultar")
@stop

@section('content')
<div class="row" style="margin-top:40px">
   <div class="offset-md-3 col-md-6">
      <div class="card">
         <div class="card-header text-center">
            Añadir un producto a una comanda
         </div>
         <div class="card-body" style="padding:30px">

            <form method="POST">
            @method('POST')
            @csrf

            <div class="form-group">
                <label for="idProducto">Producto</label>
                <select name="idProducto" id="idProducto">
                    <option value="-1">Elige un producto...</option>
                    @foreach($productos as $key => $producto)
                        @if (!in_array($producto->id, $idsProducto))
                            <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <div class="form-group">
               <label for="precio">Cantidad</label>
               <input type="number" name="cantidad" id="cantidad" class="form-control">
             </div>

            <div class="form-group text-center">
               <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                   Añadir producto
               </button>
            </div>
            </form>
         </div>
      </div>
   </div>
</div>
@stop