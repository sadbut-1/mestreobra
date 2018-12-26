<div class="modal fade" id="editPrestador" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editar Prestador</h4>
            </div>
            <form id="formEditPrestador" method="POST" enctype="multipart/form-data">
                <div class="modal-body" >
                    <label>Foto</label>
                    <input type="file" name="foto" class="form-control" placeholder="Foto ou logo">
                    <label>Nome</label>
                    <input type="text" name="nome" id="editNome" class="form-control" placeholder="Nome">
                    <label>CNPJ</label>
                    <input type="text" id="editCnpj" name="cnpj" class="form-control" placeholder="CNPJ">
                    <label>Assinatura</label>
                    <input type="text" name="assinatura" id="editAssinatura" class="form-control" placeholder="Assinatura">
                    <label>Descrição</label>
                    <textarea class="form-control" id="editDetalhes" placeholder="Descrição da empresa/prestador..." name="detalhes"></textarea>
                    <label>E-mail</label>
                    <input type="text" name="email" id="editEmail" class="form-control" placeholder="E-mail">
                    <label>Telefone</label>
                    <input type="text" name="fone" id="editFone" class="form-control" placeholder="Telefone">
                    <label>Facebook</label>
                    <input type="text" id="editFacebook" name="facebook" class="form-control" placeholder="URL Facebook">
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
                    <label>Indicações</label>
                    <input type="text" name="indicacoes" id="editIndicacoes" class="form-control" placeholder="Número de indicações">
                    <label>Anos de experiência</label>
                    <input type="text" name="experiencia" id="editExperiencia" class="form-control" placeholder="Anos de experiência">
                    <label>Apelido(slug)</label>
                    <input type="text" name="slug" id="editSlug" class="form-control" placeholder="nome-da-empresa">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-sm btn-success">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>