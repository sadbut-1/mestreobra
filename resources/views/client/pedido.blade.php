@extends('client.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <ul class="breadcrumb">
                            <li><a href="{{ url('/client/home') }}">Home</a></li>
                            <li class="active">Pedido</li>
                        </ul>
                        <div class="col-lg-8">
                            @if(session('message'))
                                <div class="alert alert-dismissible alert-success">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>{{ session('message') }}</strong>
                                </div>
                            @endif
                                <form  id="form-envia-pedido" action="{{ url('client/pedido/create') }}" method="POST" style="background-color: rgba(249,249,249,0.49); padding-top: 20px; border: 1px solid #e7e7e7;">
                                    <fieldset>
                                    {{ csrf_field() }}
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="country">O que precisa?</label>
                                            <select class="form-control" id="tipo_servico" name="tipo_servico_id" required>
                                                <option value="">- Selecione - </option>
                                                @foreach($tipos as $tipo)
                                                    <option value="{{ $tipo->id }}">{{ $tipo->nome }}</option>
                                                @endforeach
                                            </select>
                                            <span id="error-tipo_servico" style="font-size: 0.8em;color: red; margin-left: 10px;" hidden>*campo obrigatório</span>
                                        </div>
                                    </div>
                                    <!-- break -->
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="location">Qual serviço?</label>
                                            <select class="form-control" id="categorias" name="categoria_id" required>
                                                <option value="">- Selecione -</option>
                                            </select>
                                            <span id="error-categorias" style="font-size: 0.8em;color: red; margin-left: 10px;" hidden>*campo obrigatório</span>
                                        </div>
                                    </div>
                                    <!-- break -->
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="status">Especificação do serviço</label>
                                            <select class="form-control" id="servicos" name="servico_id" required>
                                                <option>- Selecione - </option>
                                            </select>
                                            <span id="error-servicos" style="font-size: 0.8em;color: red; margin-left: 10px;" hidden>*campo obrigatório</span>
                                        </div>
                                    </div>
                                    <!-- break -->
                                    <div class="col-md-12 col-sm-12" style="margin-top: 15px;">
                                        <div class="form-group">
                                            <label for="type">Onde?</label>
                                            <select class="form-control" name="local" id="local" required>
                                                <option value=""> - Selecione -</option>
                                                <option value="casa">Casa</option>
                                                <option value="sobrado">Sobrado</option>
                                                <option value="predio">Prédio</option>
                                                <option value="local_comercial">Local Comercial</option>
                                                <option value="comodo">Cômodo</option>
                                                <option value="condominio">Condomínio</option>
                                            </select>
                                            <span id="error-local" style="font-size: 0.8em;color: red; margin-left: 10px;" hidden>*campo obrigatório</span>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12" style="margin-top: 15px;">
                                        <div class="form-group">
                                            <label for="descricao">Descreva o que você precisa.</label>
                                            <textarea id="detalhes" class="form-control" rows="3" name="detalhes" required style="background-color: white;"></textarea>
                                            <div id="contador" style="margin-top: -5px; margin-bottom: 10px; color: #ff3733"></div>
                                            <span id="error-detalhes" style="font-size: 0.8em;color: red; margin-left: 10px;" hidden>*campo obrigatório</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <label for="country">Urgência:</label>
                                            <select class="form-control" name="urgencia" id="urgencia">
                                                <option value="1">Urgente</option>
                                                <option value="2" selected>Nesta semana</option>
                                                <option value="3">Próximos meses</option>
                                            </select>
                                            <span id="error-urgencia" style="font-size: 0.8em;color: red; margin-left: 10px;" hidden>*campo obrigatório</span>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <label for="country">Máximo de orçamentos</label>
                                            <select class="form-control" name="limite">
                                                @for($i = 1; $i < 8; $i++)
                                                    <option value="{{ $i }}" @if($i == 5) selected @endif>{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <div class="form-group">
                                            <a href="#" data-toggle="modal" data-target="#addPictures" class="btn btn-success btn-sm btn-block" style="margin-top: 22px;"><i class="fa fa-camera"></i> Adicionar fotos</a>
                                        </div>
                                    </div><br>
                                    <div class="col-md-12 col-sm-12" style="margin-top: 15px;">
                                        <label>Prefiro ser contatado pelo:</label>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <input type="radio" name="preferencia_contato" id="radio7" value="celular" checked>
                                                <label for="radio7">Celular</label>
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="radio" name="preferencia_contato" id="radio8" value="telefone">
                                                <label for="radio8">Telefone</label>
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="radio" name="preferencia_contato" id="radio9" value="email">
                                                <label for="radio9">Email</label>
                                            </div>
                                    </div>
                                    </div><br>
                                    <div class="col-md-12 col-sm-12" style="margin-top: 15px; margin-bottom: 15px;">
                                        <button type="submit" id="enviar_pedido" class="btn btn-info btn-lg btn-block">ENVIAR PEDIDO</button>
                                    </div>
                                    </fieldset>
                                </form>

                        </div>
                        <div class="col-sm-4">
                            <h4>SEUS DADOS:</h4>
                            <small><label>Nome:</label></small>
                            <small><p>{{ Auth::user()->name }}</p><small>
                            <label>E-mail:</label>
                            <p>{{ Auth::user()->email }}</p>
                            <label>Telefone Fixo:</label>
                            <p>{{ Auth::user()->cliente->telefone }}</p>
                            <label>Celular:</label>
                            <p>{{ Auth::user()->cliente->celular }}</p>
                            <label>Endereço:</label>
                            <p>{{ Auth::user()->cliente->rua }} - {{ Auth::user()->cliente->numero }} </p>
                            <p>{{ Auth::user()->cliente->complemento }} {{ Auth::user()->cliente->bairro }} </p>
                            <p>{{ Auth::user()->cliente->cep }} - {{ Auth::user()->cliente->cidade }} - {{ Auth::user()->cliente->estado }} </p>
                            @if(Auth::user()->cliente->empresa)
                                <label>Dados da Empresa</label>
                                <p>{{ Auth::user()->cliente->empresa }}</p>
                                <p>{{ Auth::user()->cliente->registro }}</p>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection