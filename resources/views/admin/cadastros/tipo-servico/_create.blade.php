<div class="modal fade" id="createCategoria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Novo Tipo de Serviço</h4>
            </div>
            <form action="/admin/tipo-servico/create" method="POST" enctype="multipart/form-data">
                <div class="modal-body" >
                    <label>Nome</label>
                    <input type="text" id="catNome" name="nome" class="form-control" placeholder="Nome">
                    <label>Descrição</label>
                    <textarea id="catDescricao" class="form-control" placeholder="Descrição da categoria..." name="descricao"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-sm btn-success">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>