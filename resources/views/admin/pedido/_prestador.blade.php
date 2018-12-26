<div class="modal fade" id="showPrestador" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Prestadores</h4>
            </div>
            <div class="modal-body">
                @foreach($prestadores as $prestador)
                    <p><a href="javascript:void(0)" class="pedidoPrestador" data-id="{{ $prestador->id }}"> {{ $prestador->nome }} </a></p>
                @endforeach
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>