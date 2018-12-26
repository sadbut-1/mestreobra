@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    <div class="alert alert-success">
                        Olá {{ strtok($pedido->nome, " ") }}! Muito obrigado por utilizar o Mestre Obra. Pedimos agora que avalie o serviço realizado para que possamos melhorar sempre. Sua avaliação será creditada diretamente ao prestador que lhe atendeu.
                    </div>
                    <p><strong>O serviço solicitado:</strong></p>
                    <blockquote>
                        {{ $pedido->detalhes }}
                    </blockquote>
                    <form action="{{ url('/pedido/avaliacao/save') }}" method="POST">
                        {{ csrf_field() }}
                        <label>Como você avalia o serviço do {{ $prestador->nome }}: </label>
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
                        <textarea name="comentario" rows="4" class="form-control"></textarea>
                        <input type="text" name="pedido_id" value="{{ $pedido->id }}" hidden>
                        <div class="checkbox">
                            <input type="checkbox" name="anonimo" id="checkbox1" value="1">
                            <label for="checkbox1">
                                Não exibir meu nome na avaliação.
                            </label>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-info">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection