<div class="modal fade" id="addServico" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Serviço</h4>
            </div>
            <div class="modal-body">
                <table class="table table-hover">
                    @foreach($servicos as $s)
                        <tr>
                            <td><a href="javascript:void(0)" class="selectServico" data-servico ="{{$s->id}}">{{ $s->nome }}</a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>