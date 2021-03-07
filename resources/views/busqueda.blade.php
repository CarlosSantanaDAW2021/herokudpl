@extends("layouts.main")
@section("content")

    <div class="panel panel-success">
            <form method="get" >
            <div class="panel-body">
                <label class="label-control">Nombre del producto</label>
                <input type="text" name="texto" class="form-control" placeholder="Buscar producto" value="{{$texto ?? ''}}" >
                <br>
        </div>
        <div class="panel-footer">
            <button type="submit" class="btn btn-success">buscar</button>
        </div>
        <br>
        </form>
    </div>

    <!-- check if $buscar variable is set, display buscar result -->
    @if (isset($buscar))
        <div class="panel panel-success">
            <div class="panel-heading">Resultado de la busqueda</div>
            
            <div class="panel-body">

                <div class='table-responsive'>
                  <table class='table table-bordered table-hover'>
                    <thead>
                      <tr>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Precio</th>

                      </tr>
                    </thead>
                    <tbody>

                    @foreach($producto as $productos)
                        <tr>
                            <td>{{$productos->id}}</td>
                            <td>{{$productos->descripcion}}</td>
                            <td>{{$productos->precio}}</td>
                       
                        </tr>
                    @endforeach

                    </tbody>
                        </table>
                    </div>
            </div>
        </div>
    @endif

    @stop