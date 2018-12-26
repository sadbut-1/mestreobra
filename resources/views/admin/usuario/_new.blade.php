<div class="modal fade" id="newUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Novo Usuário</h4>
            </div>
            <form action="{{ url('/admin/usuario/create') }}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <label>Nome</label>
                    <input type="text" id="editUNome" name="name" class="form-control" placeholder="Nome">
                    <label>Email</label>
                    <input type="text" id="editUEmail" name="email" class="form-control" placeholder="Email">
                    <label>Papel</label>
                    <div class="form-group" >
                        <select class="select2" style="width: 100%;" name="role">
                            <option value="1">Admin</option>
                            <option value="2">Prestador</option>
                            <option value="3">Cliente</option>
                        </select>
                    </div>
                    <label>Empresa</label>
                    <select id="editUEmpresa" name="empresa_id" class="select2" style="width: 100%;">
                        <option value="">Selecione uma empresa</option>
                        @foreach($prestadores as $p)
                            <option value="{{ $p->id }}">{{ $p->nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-sm btn-success">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>