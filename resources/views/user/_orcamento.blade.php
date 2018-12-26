<div class="modal fade" id="pedido-orcamento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                Orçamento para o pedido #<span id="orcamentoTitulo"></span>
            </div>
            <form action="/orcamento/create" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <input type="hidden" name="pedido_id"  id="orcamento-pedido">
                    <input type="hidden" name="prestador_id"  id="orcamento-prestador">
                    <label>Detalhes</label>
                    <textarea id="summernote" name="detalhes" required></textarea>
                    <div class="row">
                        <div class="col-sm-3 col-sm-offset-3">
                            <label>Subtotal</label>
                            <input type="number" step="any" name="subtotal" class="form-control" value="0">
                        </div>
                        <div class="col-sm-3">
                            <label>Desconto</label>
                            <input type="text" name="desconto" class="form-control" value="0">
                        </div>
                        <div class="col-sm-3">
                            <label>Total</label>
                            <input type="text" name="total" class="form-control" required>
                        </div>
                    </div><br>
                    <div class="row">
                        <div class="col-sm-3 col-sm-offset-9">
                            <label>Validade (dias)</label>
                            <input type="number" name="validade" class="form-control" placeholder="dias" required>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-sm btn-success">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>