@extends('user.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            @if(session('message'))
                <div class="alert alert-dismissible alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Seu interesse pelo serviço foi registrado com sucesso</strong> Você pode conferir o andamento dele na página <a href="{{ url('/prestador/interesses') }}" class="alert-link">interesses</a>.
                </div>
            @endif
            <div class="panel panel-info">
                <div class="panel-body">
                    <div class="section">
                        <div class="section-title">Serviços Disponíveis  @if(isset($pedidos))- Total {{ count($pedidos) }} @endif</div>
                        <div class="section-body">
                            <div class="media social-post">
                                <div class="media-body">
                                    @if(isset($pedidos) && count($pedidos) > 0)
                                        @foreach($pedidos as $p)
                                            @if($p->ativo == 1)
                                                <div class="panel panel-primary">
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <small><strong>Pedido:</strong> #{{ $p->id }}
                                                                </small>
                                                            </div>
                                                            <div class="col-md-4">
                                                                {{--<p><strong>Categoria:</strong> {{ $p->categoria->nome }}</p>--}}
                                                            </div>
                                                            <div class="col-md-5">
                                                                <small>
                                                                    <strong>Data:</strong> {{ date('d/m/Y - H:m', strtotime($p->created_at)) }}
                                                                </small>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <h4>{{ $p->detalhes }}</h4>
                                                        <p>
                                                            <small>
                                                                <strong>Tipo de serviço:</strong>
                                                                <span class="label label-info">@if(isset($p->servico)){{ $p->servico->nome }}@endif</span>
                                                            </small>
                                                        </p>
                                                        <p>
                                                            <small>
                                                                <strong>Preferencia de contato do cliente: </strong> <span class="label label-default"> {{ strtoupper($p->preferencia_contato) }}</span>
                                                            </small>
                                                        </p>
                                                        @if( count($p->prestador) > 0)
                                                            <small>O cliente escolheu realizar o serviço com
                                                                o(a)
                                                                <strong>{{ $p->prestador[0]->nome }}</strong>
                                                            </small>
                                                        @elseif( count($p->situacao) > 0)
                                                            O cliente está escolhendo.
                                                        @endif
                                                        @if(count($p->interessados)> 0)
                                                            <p><strong>
                                                                    <small>
                                                                        Interessdos: {{ count($p->interessados) }}</small>
                                                                </strong></p>
                                                        @endif
                                                        <br>
                                                        {{--<div id="pedido-detalhes">--}}
                                                            {{--<div>--}}
                                                                {{--<small>--}}
                                                                    {{--<strong>Solicitado por:</strong> {{ $p->nome }}--}}
                                                                {{--</small>--}}
                                                            {{--</div>--}}
                                                            {{--<div>--}}
                                                                {{--<small>--}}
                                                                    {{--<strong><i class="fa fa-envelope"></i></strong> {{ $p->email }}--}}
                                                                {{--</small>--}}
                                                            {{--</div>--}}
                                                            {{--<div class="row">--}}
                                                                {{--<div class="col-md-6">--}}
                                                                    {{--<small>--}}
                                                                        {{--<strong>--}}
                                                                            {{--<i class="fa fa-mobile-phone"></i>--}}
                                                                        {{--</strong> {{ $p->celular }}--}}
                                                                    {{--</small>--}}
                                                                {{--</div>--}}
                                                                {{--<div class="col-md-6">--}}
                                                                    {{--<small>--}}
                                                                        {{--<strong>--}}
                                                                            {{--<i class="fa fa-phone"></i>--}}
                                                                        {{--</strong> {{ $p->fone }}--}}
                                                                    {{--</small>--}}
                                                                {{--</div>--}}
                                                            {{--</div>--}}
                                                            {{--<br>--}}
                                                        {{--</div>--}}
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-md-8" id="ver-mais{{ $p->id }}">
                                                                @if( count($p->interessados) >= $p->limite)
                                                                    Pedido fechado
                                                                @else
                                                                    @if( $p->prestador->isEmpty() )
                                                                    <div id="pedido-acoes{{ $p->id }}">
                                                                        <div class="row">
                                                                            <div class="col-sm-4 col-sm-offset-1">
                                                                                <a class="btn btn-sm btn-success" href="#"
                                                                                   data-toggle="modal" data-target="#contato-por" data-pedido="{{ $p->id }}"
                                                                                   data-prestador="{{ Auth::user()->empresa->id }}">
                                                                                    Estou interessado
                                                                                </a>
                                                                            </div>
                                                                            <div class="col-sm-5">
                                                                                <form action="/pedido/interesse"
                                                                                      method="POST">
                                                                                    {{ csrf_field() }}
                                                                                    <input type="hidden" name="pedido_id"
                                                                                           value="{{ $p->id }}">
                                                                                    <input type="hidden" name="prestador_id"
                                                                                           value="{{ Auth::user()->empresa->id }}">
                                                                                    <input type="hidden" name="interesse"
                                                                                           value="0">
                                                                                    <button class="btn btn-sm btn-default"
                                                                                            type="submit">Não tenho
                                                                                        interesse
                                                                                    </button>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @endif
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    @else
                                        Nenhum serviço no momento
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('user._contato-por')

@endsection
