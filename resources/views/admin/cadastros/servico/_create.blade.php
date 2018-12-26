<div class="modal fade" id="newService" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="overflow: visible;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Cadastrar novo Tipo de Serviço</h4>
            </div>
            <form action="{{ url('/admin/servico/create') }}" method="POST">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <label>Ordem</label>
                            <input type="text" name="ordem" class="form-control" placeholder="num." autofocus>
                        </div>
                        <div class="col-sm-9">
                            <label>Nome</label>
                            <input type="text" name="nome" class="form-control" placeholder="Nome do serviço">
                        </div>
                    </div>
                    {{--<label>Descrição</label>--}}
                    {{--<textarea class="form-control" placeholder="Descrição do serviço..." name="descricao"></textarea>--}}
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-success">Salvar</button>
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Fechar</button>
                </div>
            </form>
        </div>
    </div>
</div>