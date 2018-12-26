<div class="modal fade" id="addPictures" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="overflow: visible;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Adicionar fotos</h4>
            </div>
            <div class="modal-body">
                <form action="{{ url('/pedido/fotos') }}" method="POST" class="dropzone">
                    <div class="fallback">
                        <input name="file" type="file" multiple />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>