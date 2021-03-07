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
                    Modificar estado de la comanda
                </div>
                
                <div class="card-body" style="padding:30px">
                    <form method="post" enctype="multipart/form-data">
                        @method("PUT")
                        @csrf
                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <select name="estado" id="estado">
                                @foreach($estados as $key => $estado)
                                    @if($comanda->estado == $estado)
                                        <option value="{{ $estado }}" selected>{{ $estado }}</option>
                                    @else   
                                        <option value="{{ $estado }}">{{ $estado }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                                Modificar estado
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop