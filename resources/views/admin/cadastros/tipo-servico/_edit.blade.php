<div class="modal fade" id="editTipoServico" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editar Tipo de Serviço</h4>
            </div>
            <form id="formEditTipoServico" method="POST" enctype="multipart/form-data">
                <div class="modal-body" >
                    <label>Nome</label>
                    <input type="text" id="tipoServicoNome" name="nome" class="form-control" placeholder="Nome">
                    <label>Descrição</label>
                    <textarea id="tipoServicoDescricao" class="form-control" placeholder="Descrição da categoria..." name="descricao"></textarea>
                    <label>Slug</label>
                    <input type="text" id="tipoServicoSlug" name="slug" class="form-control" placeholder="Slug">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-sm btn-success">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>