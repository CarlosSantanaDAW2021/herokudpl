<div class="modal fade" id="create-{{ $comanda->id }}" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
    <form method="post" action="{{url('/admin/comandas/create/' . $comanda->id)}}" style="display:inline">
        @method("POST")
        @csrf
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Resumen del pedido</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <p></p>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Confirmar</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </form>
</div>