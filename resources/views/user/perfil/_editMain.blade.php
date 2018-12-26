<div class="modal fade" id="editMain" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editar</h4>
            </div>
            <form id="formEditMain" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <label>Nome</label>
                    <input type="text" id="editPNome" name="nome" class="form-control" placeholder="Nome">
                    <label>Assinatura</label>
                    <input type="text" id="editPAssinatura" name="assinatura" class="form-control" placeholder="Assinatura">
                    <label>Logotipo</label>
                    <input type="file" name="foto" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-sm btn-success">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>