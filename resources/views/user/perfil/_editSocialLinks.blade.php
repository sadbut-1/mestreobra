<div class="modal fade" id="editSocialLinks" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="overflow: visible;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editar</h4>
            </div>

                <form id="formEditSocial" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        {{ csrf_field() }}
                        <label>Facebook</label>
                        <input type="text" name="facebook" id="editPFacebook" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-sm btn-success">Salvar</button>
                    </div>
                </form>


        </div>
    </div>
</div>