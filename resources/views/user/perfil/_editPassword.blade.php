<div class="modal fade" id="editPassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="overflow: visible;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Alterar senha</h4>
            </div>

                <form action="{{ url('/usuario/change-pass') }}" id="formEditPassword" method="POST" >
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <label>Senha antiga:</label>
                        <input type="password" name="old_password" class="form-control">
                        <label>Nova senha:</label>
                        <input type="password" name="new_password" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-sm btn-success">Salvar</button>
                    </div>
                </form>


        </div>
    </div>
</div>