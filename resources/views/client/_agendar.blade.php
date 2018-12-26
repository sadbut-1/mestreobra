<div class="modal fade" id="agendar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Agendar</h4>
            </div>
            <form action="{{ url('/client/agenda/create') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <label>Data</label>
                            <input type="date" name="data" class="form-control">
                        </div>
                        <div class="col-sm-4">
                            <label>Horário</label>
                            <input type="time" name="hora" class="form-control">
                        </div>
                    </div>
                    <label>Local</label>
                    <input type="text" name="local" class="form-control">
                    <input type="hidden" id="agendaPedidoId" name="pedido_id" class="form-control">
                    <input type="hidden" id="agendaPrestadorId" name="prestador_id" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-sm btn-success">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>