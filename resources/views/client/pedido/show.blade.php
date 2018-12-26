@extends('client.app-message')

@section('content')
    <div class="app-messaging-container">
        <div class="card">
            <div class="card-body">
                <strong>Serviço:</strong> {{ $pedido->detalhes }}
            </div>
        </div>
        @if(count($pedido->interessados) >0)
        <div class="app-messaging" id="collapseMessaging">
            <div class="chat-group">
                <div class="heading">Mensagens</div>
                <ul class="group full-height">
                    <li class="section">Prestadores</li>
                    @foreach($pedido->interessados as $interessado)
                        <li class="message">
                            <a class="prestador-mensagem"
                               data-prestador-nome="{{ $interessado->prestador->nome }}"
                               data-pedido-id="{{ $pedido->id }}"
                               data-prestador-id="{{ $interessado->prestador->id }}"
                               data-toggle="collapse" href="#collapseMessaging" aria-expanded="false" aria-controls="collapseMessaging">
                                <span class="badge badge-warning pull-right">{{ count($interessado->prestador->mensagens) }}</span>
                                <div class="message">
                                    <img class="profile" src="https://placehold.it/100x100">
                                    <div class="content">
                                        <div class="title">{{ $interessado->prestador->nome }}</div>
                                        <div class="description">{{ $interessado->prestador->email }}</div>
                                    </div>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="messaging">
                <div class="heading">
                    <div class="title">
                        <a class="btn-back" data-toggle="collapse" href="#collapseMessaging" aria-expanded="false" aria-controls="collapseMessaging">
                            <i class="fa fa-angle-left" aria-hidden="true"></i>
                        </a>
                        <span id="titulo-prestador-nome">{{ $pedido->interessados[0]->prestador->nome }}</span>
                    </div>
                    <div class="action"></div>
                </div>
                <ul class="chat">
                 <br>
                    @foreach($pedido->interessados[0]->prestador->mensagens as $mensagem)
                        <li @if($mensagem->cliente)class="right" @endif>
                            <div class="message">{{ $mensagem->mensagem }}</div>
                            <div class="info">
                                <div class="datetime">{{ $mensagem->created_at }}</div>
                            <div class="status"><i class="fa fa-check" aria-hidden="true"></i> Lida</div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <div class="footer">
                    <div class="message-box">
                        <textarea placeholder="mensagem..." class="form-control" id="texto-mensagem"></textarea>
                        <button id="enviar-mensagem" class="btn btn-default" data-pedido-id="{{ $pedido->id }}" data-prestador-id="{{ $pedido->interessados[0]->prestador->id }}">
                            <i class="fa fa-paper-plane" aria-hidden="true"></i><span>Enviar</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @else
            <hr>
            <div class="card">
                <div class="card-body">
                    Nenhuma mensagem até o momento.
                </div>
            </div>
        @endif
    </div>
@endsection