<div class="modal fade" id="editDetail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="overflow: visible;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editar detalhe</h4>
            </div>

                <form id="formEditDetail" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <label>Descrição</label>
                        <textarea id="editPDetalhe" name="detalhes" class="form-control" rows="5"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-sm btn-success">Salvar</button>
                    </div>
                </form>


        </div>
    </div>
</div>