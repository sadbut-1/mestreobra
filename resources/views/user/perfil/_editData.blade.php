<div class="modal fade" id="editData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editar dados cadastrais</h4>
            </div>

                <form id="formEditData" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <label>CNPJ</label>
                        <input type="text" id="editCnpj" name="cnpj" class="form-control" placeholder="CNPJ">
                        <label>E-mail</label>
                        <input type="text" name="email" id="editEmail" class="form-control" placeholder="E-mail">
                        <label>Telefone</label>
                        <input type="text" name="fone" id="editFone" class="form-control" placeholder="Telefone">
                        <label>CEP</label>
                        <input type="text" name="cep" id="editCep" class="form-control" placeholder="CEP">
                        <label>Rua</label>
                        <input type="text" name="rua" id="editRua" class="form-control" placeholder="Rua">
                        <label>Número</label>
                        <input type="text" name="numero" id="editNumero" class="form-control" placeholder="Número">
                        <label>Complemento</label>
                        <input type="text" name="complemento" id="editComplemento" class="form-control" placeholder="Complemento">
                        <label>Bairro</label>
                        <input type="text" name="bairro" id="editBairro" class="form-control" placeholder="Bairro">
                        <label>Cidade</label>
                        <input type="text" name="cidade" id="editCidade" class="form-control" placeholder="Cidade">
                        <label>Estado</label>
                        <input type="text" name="estado" id="editEstado" class="form-control" placeholder="Estado">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-sm btn-success">Salvar</button>
                    </div>
                </form>


        </div>
    </div>
</div>