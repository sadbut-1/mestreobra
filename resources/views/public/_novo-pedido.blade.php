<div class="modal fade" id="newPedido" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">


            <div class="modal-body" >
                <div class="step">
                    <ul class="nav nav-tabs nav-justified" role="tablist">
                        <li role="step" class="active">
                            <a href="#step1" id="step1-tab" role="tab" data-toggle="tab"
                               aria-controls="home" aria-expanded="true">
                                <div class="icon fa fa-file-text-o"></div>
                                <div class="heading">
                                    <div class="title">Seu pedido</div>
                                    <div class="description">O que você precisa?</div>
                                </div>
                            </a>
                        </li>
                        <li role="step">
                            <a href="#step2" role="tab" id="step2-tab" data-toggle="tab"
                               aria-controls="profile">
                                <div class="icon fa fa-user"></div>
                                <div class="heading">
                                    <div class="title">Seus dados</div>
                                    <div class="description">Faça seu cadastro.</div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">

                        <div role="tabpanel" class="tab-pane active" id="step1">
                            <form action="{{ url('pedido/create') }}" method="POST">
                                {{ csrf_field() }}
                                <label>Qual a sua urgência?</label>
                                <div>
                                    <div class="radio radio-inline">
                                        <input type="radio" name="urgencia" id="radio5" value="urgente" checked>
                                        <label for="radio5">
                                            Início imediato
                                        </label>
                                    </div>
                                    <div class="radio radio-inline">
                                        <input type="radio" name="urgencia" id="radio6" value="futuro">
                                        <label for="radio6">
                                            Nos próximos meses
                                        </label>
                                    </div>
                                </div>

                                <label>O que você precisa?</label>
                                <textarea name="detalhes" rows="3" class="form-control" autofocus></textarea>
                                <div id="contador" style="margin-top: -15px; margin-bottom: 10px;"></div>

                                <label>Categoria</label>
                                <select class="select2" id="categoria" name="categoria_id" style="width: 100%;">
                                    <option value="">Selecione uma categoria</option>
                                    @foreach($categorias as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->nome }}</option>
                                    @endforeach
                                </select>

                                <div id="servicos"></div>
                                <hr>
                                <div role="step">
                                    <a href="#step2" role="tab" id="proximo" data-toggle="tab"
                                       class="btn btn-lg btn-info" aria-controls="profile">
                                        Próximo
                                    </a>
                                </div>

                        </div>
                        <div role="tabpanel" class="tab-pane" id="step2">
                            <label>CEP</label>
                            <input type="text" name="cep" id="cep" class="form-control" placeholder="Digite seu CEP">
                            <label>Nome</label>
                            <input type="text" name="nome" id="nome" class="form-control" placeholder="Digite seu nome">
                            <label>E-mail</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="Digite seu e-mail">
                            <label>Telefone</label>
                            <input type="text" class="form-control" id="fone" name="fone" placeholder="Digite seu telefone">
                            <label>Prefiro ser contatado pelo:</label>
                            <div>
                                <div class="radio radio-inline">
                                    <input type="radio" name="preferencia_contato" id="radio7" value="celular" checked>
                                    <label for="radio7">Celular</label>
                                </div>
                                <div class="radio radio-inline">
                                    <input type="radio" name="preferencia_contato" id="radio8" value="telefone">
                                    <label for="radio8">Telefone</label>
                                </div>
                                <div class="radio radio-inline">
                                    <input type="radio" name="preferencia_contato" id="radio9" value="email">
                                    <label for="radio9">Email</label>
                                </div>
                            </div>
                            <label>Quero receber até &nbsp;
                                <select name="limite">
                                    @for($i = 1; $i < 8; $i++)
                                        <option value="{{ $i }}" @if($i == 5) selected @endif>{{ $i }}</option>
                                    @endfor
                                </select> &nbsp;orçamento(s)
                            </label>

                            <input type="text" name="rua" id="rua" hidden>
                            <input type="text" name="bairro" id="bairro" hidden>
                            <input type="text" name="cidade" id="cidade" hidden>
                            <input type="text" name="estado" id="estado" hidden>
                            <input type="text" name="pagina" value="empresas" hidden>
                            <hr>
                            <button type="submit" class="btn btn-lg btn-info" id="enviar_pedido">Enviar pedido</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>