<div class="modal fade" id="contato-por" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/pedido/interesse" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <input type="text" name="pedido_id" value="{{ $pedido->id }}" hidden>
                    <input type="text" name="prestador_id" value="{{ $prestador->id }}" hidden>
                    <input type="text" name="interesse" value="1" hidden>
                    <label>Envie uma mensagem direto para {{ $pedido->nome }}:</label>
                    <br><br>
                    @if($pedido->preferencia_contato == 'celular')
                        <ul class="bg-warning"><br>
                            <li>
                                <span style="font-size: 0.9em;">
                                    O solicitante optou por ser contatado via <strong>Celular</strong> e <strong>aguarda sua ligação ou contato via Whatsapp</strong> para maiores detalhes sobre o serviço. 
                                </span>
                            </li>
                            <br>
                            <li>
                                <span style="font-size: 0.7em;">
                                    Você poderá ver o telefone do cliente logo após clicar em Tenho interesse.  
                                </span>
                            </li>
                            <br>
                            <li>
                                <span style="font-size: 0.7em;">
                                    <strong>ATENÇÃO! Só clique em TENHO INTERESSE, caso for realmente ligar para o cliente.</strong>
                                </span>
                            </li><br>
                        </ul>
                    @endif
                    @if($pedido->preferencia_contato == 'telefone')
                        <ul class="bg-warning"><br>
                            <li>
                                <span style="font-size: 0.9em;">
                                    O solicitante optou por ser contatado via <strong>Telefone</strong> e <strong>aguarda sua ligação</strong> para maiores detalhes sobre o serviço. 
                                </span>
                            </li>
                            <br>
                            <li>
                                <span style="font-size: 0.7em;">
                                    Você poderá ver o telefone do cliente logo após clicar em Tenho interesse.  
                                </span>
                            </li>
                            <br>
                            <li>
                                <span style="font-size: 0.7em;">
                                    <strong>ATENÇÃO! Só clique em TENHO INTERESSE, caso for realmente ligar para o cliente.</strong>
                                </span>
                            </li><br>
                        </ul>
                    @endif
                    @if($pedido->preferencia_contato == 'email')
                        <textarea class="form-control" name="mensagem" rows="3" placeholder="Olá {{ $pedido->nome }}! " required></textarea>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-sm btn-success">Tenho interesse</button>
                </div>
            </form>
        </div>
    </div>
</div>