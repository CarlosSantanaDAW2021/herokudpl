@extends("layouts.admin-main")
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
               <label for="title">Cliente Solicitante</label>
               <input type="text"name="nombre" value="{{$comanda->idCliente}}"></input>
            </div>

            <div class="form-group">
               <label for="title">Estado del pedido</label>
               <input type="list" name="estado" value="{{$comanda->estado}}"></input>
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