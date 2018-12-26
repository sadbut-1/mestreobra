<div class="col-lg-8">
    <div class="well-form">
        <div class="alert-form">
            Solicite seu orçamento aqui.<strong> É gratis e sem compromisso!</strong>
        </div>
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
                       aria-controls="profile" class="disabledTab">
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
                        <textarea name="detalhes" rows="3" id="detalhes" class="form-control" autofocus minlength="30"
                                  required></textarea>
                        <div id="contador" style="margin-top: -15px; margin-bottom: 10px; color: #ff3733"></div>
                        <br>
                        <p><a href="#" data-toggle="modal" data-target="#addPictures"><i class="fa fa-camera"></i>
                                Adicionar foto(s)</a>&nbsp;&nbsp;
                            <small>*Caso queira, é possível adicionar fotos para explicar melhor o problema</small>
                        </p>

                        <label>Categoria</label>
                        <select class="select2" id="categoria" name="categoria_id" style="width: 100%;" required>
                            <option value="">Selecione uma categoria</option>
                            @foreach($categorias as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->nome }}</option>
                            @endforeach
                        </select>
                        <div id="errocategoria" style="margin-top: -15px; margin-bottom: 10px; color: #ff3733"></div>

                        <div id="servicos"></div>
                        <br><label>Quero receber até &nbsp;
                            <select name="limite">
                                @for($i = 1; $i < 8; $i++)
                                    <option value="{{ $i }}" @if($i == 5) selected @endif>{{ $i }}</option>
                                @endfor
                            </select> &nbsp;orçamento(s)
                        </label>
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
                    <input type="text" name="cep" id="cep" class="form-control" placeholder="Digite seu CEP" required>
                    <div id="cep_invalido" style="margin-top: -15px; margin-bottom: 10px; color: #ff3733;"></div>
                    <label>Nome</label>
                    <input type="text" name="nome" id="nome" class="form-control" placeholder="Digite seu nome"
                           required>
                    <label>E-mail</label> <a href="javascript:void(0)" id="showCC"> <i class="fa fa-plus-circle"></i></a>
                    <input type="email" name="email" id="email" class="form-control"
                                   placeholder="Digite seu e-mail" required>
                    <input type="email" name="cc" id="cc" class="form-control" placeholder="Com cópia para...">
                    <label>Celular</label>
                    <input type="text" class="form-control" id="celular" name="celular" placeholder="Digite seu número"
                           required>
                    <label>Outro Telefone</label>
                    <input type="text" class="form-control" id="fone" name="fone" placeholder="Digite seu número">

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

                    <div class="form-group" id="como-conheceu">
                        <label>Como conheceu o Mestre Obra?</label>
                        <select name="conheceu_por" class="select2" style="width: 100%;">
                            <option value="google">Google</option>
                            <option value="facebook">Facebook</option>
                            <option value="amigo">Indicação de amigo</option>
                            <option value="panfleto">Panfleto</option>
                            <option value="outros">Outro</option>
                        </select>
                    </div>
                    <input type="text" name="rua" id="rua" hidden>
                    <input type="text" name="bairro" id="bairro" hidden>
                    <input type="text" name="cidade" id="cidade" hidden>
                    <input type="text" name="estado" id="estado" hidden>
                    <input type="text" name="pagina" value="principal" hidden>
                    <hr>

                    <button type="submit" class="btn btn-lg btn-info" id="enviar_pedido">Enviar pedido</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
