<div class="modal fade" id="contato-por" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="/pedido/interesse" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <input type="hidden" name="pedido_id"  id="contato-pedido">
                    <input type="hidden" name="prestador_id"  id="contato-prestador">
                    <input type="hidden" name="interesse" value="1">
                    <div>
                        <div class="radio">
                            <input type="radio" name="contato" id="contato1" value="telefone" checked>
                            <label for="contato1">
                                Vou entrar em contato por <strong>Telefone Fixo</strong>
                            </label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="contato" id="contato2" value="celular">
                            <label for="contato2">
                                Vou entrar em contato por <strong>Celular</strong>
                            </label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="contato" id="contato3" value="whatsapp">
                            <label for="contato3">
                                Vou entrar em contato por <strong>Whatsapp</strong>
                            </label>
                        </div>
                        <div class="radio">
                            <input type="radio" name="contato" id="contato4" value="email">
                            <label for="contato4">
                                Vou entrar em contato por <strong>E-mail</strong>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    {{--<button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Fechar</button>--}}
                    <button type="submit" class="btn btn-sm btn-success">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>