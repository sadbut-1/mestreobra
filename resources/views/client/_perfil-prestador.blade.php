<div class="modal fade" id="perfil-prestador" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="perfilTitulo"></h4>
            </div>
            <div class="modal-body">
                <div class="section">
                    <div class="section-title">Descrição da Empresa</div>
                    <div class="section-body">
                        <div class="media social-post">
                            <div class="media-body">
                                <small><div class="media-content" id="perfilDetalhes"></div></small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section">
                    <div class="section-title">Dados cadastrais</div>
                    <div class="section-body">
                        <div class="media social-post">
                            <div class="media-body">
                                <div class="media-content">
                                    <p><small><strong>CNPJ/CPF:</strong><span id="perfilCNPJ"></span></small></p>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p><small><strong>E-mail:</strong> <span id="perfilEmail"></span></small></p>
                                        </div>
                                        <div class="col-sm-5">
                                            <p><small><strong>Fone:</strong> <span id="perfilFone"></span></small></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p><small><strong>Rua:</strong> <span id="perfilRua"></span></small></p>
                                        </div>
                                        <div class="col-sm-2">
                                            <p><small><strong>Num.:</strong> <span id="perfilNum"></span></small></p>
                                        </div>
                                        <div class="col-sm-2">
                                            <p><small><strong>Comp.:</strong> <span id="perfilComp"></span></small></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p><small><strong>Bairro:</strong> <span id="perfilBairro"></span></small></p>
                                        </div>
                                        <div class="col-sm-3">
                                            <p><small><strong>CEP:</strong> <span id="perfilCEP"></span></small></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p><small><strong>Cidade:</strong> <span id="perfilCidade"></span></small></p>
                                        </div>
                                        <div class="col-sm-3">
                                            <p><small><strong>Uf:</strong> <span id="perfilUf"></span></small></p>
                                        </div>
                                    </div>
                                </div>
                                {{--<div class="media-action">--}}
                                    {{--<a href="#" data-id="{{ $prestador->id }}" data-toggle="modal" data-target="#editData"><i class="fa fa-edit"> Alterar</i></a>&nbsp--}}
                                {{--</div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-success" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>