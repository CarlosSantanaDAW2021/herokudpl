<div class="modal fade" id="delete-{{ $producto->idComanda }}-{{ $producto->idProducto }}" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
    <form method="post" action="{{url('/admin/comandas/delete/' . $producto->idComanda . '/' . $producto->idProducto)}}" style="display:inline">
        @method("DELETE")
        @csrf
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Eliminar registro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <p>¿Estás seguro de que quieres eliminar el registro?</p>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </form>
</div>