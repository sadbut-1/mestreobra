<div class="modal fade" id="newPrestador" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Cadastrar novo Prestador</h4>
            </div>
            <form action="{{ url('/admin/prestador/create') }}" method="POST" enctype="multipart/form-data">
                <div class="modal-body" >
                    <label>Foto</label>
                    <input type="file" name="foto" class="form-control" placeholder="Foto ou logo">
                    <label>Nome</label>
                    <input type="text" name="nome" class="form-control" placeholder="Nome">
                    <label>Assinatura</label>
                    <input type="text" name="assinatura" class="form-control" placeholder="Assinatura">
                    <label>CNPJ</label>
                    <input type="text" name="cnpj" class="form-control" placeholder="CNPJ">
                    <label>Descrição</label>
                    <textarea class="form-control" placeholder="Descrição da empresa/prestador..." name="detalhes"></textarea>
                    <label>E-mail</label>
                    <input type="text" name="email" class="form-control" placeholder="E-mail">
                    <label>Telefone</label>
                    <input type="text" name="fone" class="form-control" placeholder="Telefone">
                    <label>Facebook</label>
                    <input type="text" name="facebook" class="form-control" placeholder="URL Facebook">
                    <label>CEP</label>
                    <input type="text" name="cep" class="form-control" placeholder="CEP">
                    <label>Rua</label>
                    <input type="text" name="rua" class="form-control" placeholder="Rua">
                    <label>Número</label>
                    <input type="text" name="numero" class="form-control" placeholder="Número">
                    <label>Complemento</label>
                    <input type="text" name="complemento" class="form-control" placeholder="Complemento">
                    <label>Bairro</label>
                    <input type="text" name="bairro" class="form-control" placeholder="Bairro">
                    <label>Cidade</label>
                    <input type="text" name="cidade" class="form-control" placeholder="Cidade">
                    <label>Estado</label>
                    <input type="text" name="estado" class="form-control" placeholder="Estado">
                    <label>Indicações</label>
                    <input type="text" name="indicacoes" class="form-control" placeholder="Número de indicações">
                    <label>Anos de experiência</label>
                    <input type="text" name="experiencia" class="form-control" placeholder="Anos de experiência">
                    <label>Apelido(slug)</label>
                    <input type="text" name="slug" class="form-control" placeholder="nome-da-empresa">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-sm btn-success">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>