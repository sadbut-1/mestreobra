<div class="modal fade" id="edit-perfil-cliente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editar dados cadastrais</h4>
            </div>

                <form action="{{ url('/client/update', $cliente->id) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        {{--<label>E-mail</label>--}}
                        {{--<input type="text" name="email" class="form-control" value="{{ $cliente->usuario->email }}">--}}
                        <label>Telefone</label>
                        <input type="text" name="telefone" class="form-control" placeholder="Telefone" value="{{ $cliente->telefone }}">
                        <label>Celular</label>
                        <input type="text" name="celular" class="form-control" placeholder="Celular" value="{{ $cliente->celular }}">
                        <label>CEP</label>
                        <input type="text" name="cep" id="editCep" class="form-control" placeholder="CEP" value="{{ $cliente->cep }}">
                        <label>Rua</label>
                        <input type="text" name="rua" class="form-control" placeholder="Rua" value="{{ $cliente->rua }}">
                        <label>Número</label>
                        <input type="text" name="numero" class="form-control" placeholder="Número" value="{{ $cliente->numero }}">
                        <label>Complemento</label>
                        <input type="text" name="complemento" class="form-control" placeholder="Complemento" value="{{ $cliente->complemento }}">
                        <label>Bairro</label>
                        <input type="text" name="bairro" class="form-control" placeholder="Bairro" value="{{ $cliente->bairro }}">
                        <label>Cidade</label>
                        <input type="text" name="cidade" class="form-control" placeholder="Cidade" value="{{ $cliente->cidade }}">
                        <label>Estado</label>
                        <input type="text" name="estado" class="form-control" placeholder="Estado" value="{{ $cliente->estado }}">
                        <label>CNPJ/CPF</label>
                        <input type="text" name="registro" class="form-control" placeholder="CNPJ ou CPF" value="{{ $cliente->registro }}">
                        <label>Empresa</label>
                        <input type="text" name="empresa" class="form-control" placeholder="Empresa" value="{{ $cliente->empresa }}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-sm btn-success">Salvar</button>
                    </div>
                </form>


        </div>
    </div>
</div>