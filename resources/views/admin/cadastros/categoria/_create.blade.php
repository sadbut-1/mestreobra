<div class="modal fade" id="createCategoria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Nova Categoria</h4>
            </div>
            <form action="/admin/categoria/create" method="POST" enctype="multipart/form-data">
                <div class="modal-body" >
                    <label>Nome</label>
                    <input type="text" id="catNome" name="nome" class="form-control" placeholder="Nome" autofocus>
                    <label>Tipo de Serviço</label>
                    <input type="text" id="catIcone" name="icone" class="form-control" placeholder="Tipo de serviço">
                    {{--<label>Descrição</label>--}}
                    {{--<textarea id="catDescricao" class="form-control" placeholder="Descrição da categoria..." name="descricao"></textarea>--}}
                    {{--<label>Slug</label>--}}
                    {{--<input type="text" id="catSlug" name="slug" class="form-control" placeholder="link">--}}
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-success">Salvar</button>
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Fechar</button>
                </div>
            </form>
        </div>
    </div>
</div>