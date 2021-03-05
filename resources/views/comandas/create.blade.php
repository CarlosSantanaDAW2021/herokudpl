@extends("layouts.app")
@include('partials.form-partial')
@section('content')
<div class="row" style="margin-top:40px">
   <div class="offset-md-3 col-md-6">
      <div class="card">
         <div class="card-header text-center">
            Crea una comanda
         </div>
         <div class="card-body" style="padding:30px">

            <form method="POST">
            @method('POST')
            @csrf
            
            <div class="form-group">
               <label for="title">Formulario de comanda</label>
            </div>

            <div class="form-group">
               <label for="title">Estado del pedido</label>
               <input type="text" name="estado" value="{{$comanda->estado}}"></input>
            </div>

            @foreach($productos as $producto)
            <div data-wrapper-react="true" class="form-product-item-detail">
                  <input type="checkbox" class="form-checkbox  form-product-input" id="input_15_1014" name="productos" value="1014" />
                  <label for="input_15_1014" class="form-product-container">
                    <span data-wrapper-react="true">
                      <span class="form-product-name" id="product-name-input_15_1014">
                        {{$producto->nombre}}
                      </span>
                      <span class="form-product-details">
                        <b>
                          <span data-wrapper-react="true">
                            €
                            <span id="input_15_1014_price">
                              {{$producto->precio}}
                            </span>
                          </span>
                        </b>
                      </span>
                    </span>
            @endforeach

            <div class="form-group">
               <label for="precio">Cantidad</label>
               <input type="number" name="cantidad" id="cantidad" class="form-control" value="{{$comandaproducto->cantidad}}">
             </div>

            <div class="form-group text-center">
               <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                   Agregar comanda
               </button>
            </div>
            </form>
         </div>
      </div>
   </div>
</div>
@stop