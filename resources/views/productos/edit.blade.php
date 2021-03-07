@extends("layouts.admin-main")

@section("panel-admin")
    @include("partials.panel-admin")
@stop

@section("mostrar-ocultar")
    @include("partials.mostrar-ocultar")
@stop

@section("content")
    @if ($errors->any())
        <div class="row justify-content-center">
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

    <div class="row" style="margin-top:40px">
        <div class="offset-md-3 col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    Modificar producto
                </div>
                
                <div class="card-body" style="padding:30px">
                    <form method="post">
                        @method("PUT")
                        @csrf
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" value="{{$producto->nombre}}">
                        </div>

                        <div class="form-group">
                            <label for="precio">Precio</label>
                            <input type="text" name="precio" id="precio" class="form-control" value="{{$producto->precio}}">
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <input type="text" name="descripcion" id="descripcion" class="form-control" value="{{$producto->descripcion}}">
                        </div>
                    
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                                Modificar producto
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop