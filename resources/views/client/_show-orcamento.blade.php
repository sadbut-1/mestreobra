<div class="modal fade" id="show-orcamento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Orçamento do pedido <span></span></h4>
            </div>
            <div class="modal-body">
                <div class="section">
                    <div class="section-title"><strong>Empresa: </strong> <span id="orcamentoNome"> </span></div>
                    <div class="section-body">
                        <div class="media social-post">
                            <div class="media-body">
                                <div class="media-content">
                                    <p><small><strong>CNPJ/CPF:</strong><span id="orcamentoCNPJ"></span></small></p>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p><small><strong>E-mail:</strong> <span id="orcamentoEmail"></span></small></p>
                                        </div>
                                        <div class="col-sm-5">
                                            <p><small><strong>Fone:</strong> <span id="orcamentoFone"></span></small></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p><small><strong>Rua:</strong> <span id="orcamentoRua"></span></small></p>
                                        </div>
                                        <div class="col-sm-2">
                                            <p><small><strong>Num.:</strong> <span id="orcamentoNum"></span></small></p>
                                        </div>
                                        <div class="col-sm-2">
                                            <p><small><strong>Comp.:</strong> <span id="orcamentoComp"></span></small></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p><small><strong>Bairro:</strong> <span id="orcamentoBairro"></span></small></p>
                                        </div>
                                        <div class="col-sm-3">
                                            <p><small><strong>CEP:</strong> <span id="orcamentoCEP"></span></small></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <p><small><strong>Cidade:</strong> <span id="orcamentoCidade"></span></small></p>
                                        </div>
                                        <div class="col-sm-3">
                                            <p><small><strong>Uf:</strong> <span id="orcamentoUf"></span></small></p>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div id="orcamentoDetalhes"></div>
                                <hr>
                                <div id="orcamentoTotal" style="float: right;font-style: inherit;"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Fechar</button>
                {{--<button type="submit" class="btn btn-sm btn-success">Salvar</button>--}}
            </div>
        </div>
    </div>
</div>