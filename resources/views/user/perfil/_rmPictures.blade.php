<div class="modal fade" id="rmPrestadorPictures" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formEditFoto" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div id="fotoPortifolioShow"></div>
                    <br>
                    <label>Descrição:</label>
                    <input type="text" name="descricao" id="descricaoFoto" class="form-control">
                </div>
                <div class="modal-footer">
                    <a id="excluirFoto" class="btn btn-danger">Excluir</a>
                    <button class="btn btn-success" type="submit">Salvar</button>
                    <button class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
            </form>
        </div>
    </div>
</div>