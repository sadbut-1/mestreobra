@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if($errors->any())
                <div class="alert alert-dismissible alert-danger">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <ul class="alert">
                        @foreach($errors->all() as $e)
                            <li>{{$e}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card">

                <div class="card-body">
                    <div class="alert alert-success">
                        Olá {{ strtok($pedido->nome, " ") }}! Muito obrigado por utilizar o Mestre Obra. Gostariamos de saber como esta o andamento do seu pedido.
                    </div>
                    <p><i><strong>Seu pedido: </strong> {{ str_limit($pedido->detalhes, $limit = 100, $end = '...') }}</i></p>
                    <form action="{{ url('/pedido/situacao/save') }}" method="POST" id="situacao-pedido">
                        {{ csrf_field() }}
                        <label>Você contratou algum profissional? </label>
                        {{--<label>Como você avalia o serviço do Reparatron: </label>--}}
                        <div>
                            <div class="radio">
                                <input type="radio" name="situacao" id="radio-sim-realizado" value="1">
                                <label for="radio-sim-realizado">
                                    Sim, o serviço ja foi realizado
                                </label>
                            </div>
                            <div class="radio">
                                <input type="radio" name="situacao" id="radio-sim-realizando" value="2">
                                <label for="radio-sim-realizando">
                                    Sim, o serviço esta sendo realizado
                                </label>
                            </div>
                            <div class="radio">
                                <input type="radio" name="situacao" id="radio-nao-avaliando" value="3">
                                <label for="radio-nao-avaliando">
                                    Não, ainda estou avaliando propostas
                                </label>
                            </div>
                            <div class="radio">
                                <input type="radio" name="situacao" id="radio-nao-recusado" value="4">
                                <label for="radio-nao-recusado">
                                    Não pretendo fechar com os profissionais indicados
                                </label>
                            </div>
                        </div>
                        <div id="sim-contratou" hidden>
                            <label>Qual profissional foi contratado?</label>
                            @foreach($pedido->interessados as $v)
                                <div class="radio">
                                    <input type="radio" name="prestador_id" id="radio9{{ $v->id }}" value="{{ $v->prestador->id }}">
                                    <label for="radio9{{ $v->id }}">
                                        {{ $v->prestador->nome }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <div id="sim-realizou" hidden>
                            <label>Como você avalia o serviço do profissional: </label>
                            {{--<label>Como você avalia o serviço do Reparatron: </label>--}}
                            <div>
                                <div class="radio radio-inline">
                                    <input type="radio" name="estrelas" id="radio10" value="1" checked>
                                    <label for="radio10">
                                        <i class="fa fa-star" style="color: #e9aa3a;"></i>
                                    </label>
                                </div>
                                <div class="radio radio-inline">
                                    <input type="radio" name="estrelas" id="radio11" value="2">
                                    <label for="radio11">
                                        <i class="fa fa-star" style="color: #e9aa3a;"></i><i class="fa fa-star" style="color: #e9aa3a;"></i>
                                    </label>
                                </div>
                                <div class="radio radio-inline">
                                    <input type="radio" name="estrelas" id="radio12" value="3">
                                    <label for="radio12">
                                        <i class="fa fa-star" style="color: #e9aa3a;"></i><i class="fa fa-star" style="color: #e9aa3a;"></i><i class="fa fa-star" style="color: #e9aa3a;"></i>
                                    </label>
                                </div>
                                <div class="radio radio-inline">
                                    <input type="radio" name="estrelas" id="radio13" value="4">
                                    <label for="radio13">
                                        <i class="fa fa-star" style="color: #e9aa3a;"></i><i class="fa fa-star" style="color: #e9aa3a;"></i><i class="fa fa-star" style="color: #e9aa3a;"></i><i class="fa fa-star" style="color: #e9aa3a;"></i>
                                    </label>
                                </div>
                                <div class="radio radio-inline">
                                    <input type="radio" name="estrelas" id="radio14" value="5">
                                    <label for="radio14">
                                        <i class="fa fa-star" style="color: #e9aa3a;"></i><i class="fa fa-star" style="color: #e9aa3a;"></i><i class="fa fa-star" style="color: #e9aa3a;"></i><i class="fa fa-star" style="color: #e9aa3a;"></i><i class="fa fa-star" style="color: #e9aa3a;"></i>
                                    </label>
                                </div>
                            </div>
                            <label>Deixe um comentário sobre o serviço. Sua opnião é muito importante para nós</label>
                            <textarea name="comentario_p" rows="4" class="form-control"></textarea>
                            <input type="text" name="pedido_id" value="{{ $pedido->id }}" hidden>
                            <div class="checkbox">
                                <input type="checkbox" name="anonimo" id="checkbox1" value="1">
                                <label for="checkbox1">
                                    Não exibir meu nome na avaliação.
                                </label>
                            </div>
                        </div>
                        <div id="nao-contratou" hidden>
                            <label>Poderia nos dizer o motivo?</label>
                            <textarea name="comentario" rows="2" class="form-control"></textarea>
                        </div>
                        <input type="text" name="pedido_id" value="{{ $pedido->id }}" hidden>
                        <input type="text" name="nome" id="nome-situacao" hidden>
                        <hr>
                        <button type="submit" class="btn btn-info">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection