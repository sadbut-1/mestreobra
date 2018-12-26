@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-sm-4">
                                    <strong>PEDIDO: #{{ $pedido->id }} </strong>
                                </div>
                                <div class="col-sm-5">
                                    <strong>CATEGORIA: {{ $pedido->categoria->nome }} </strong>
                                </div>
                                <div class="col-sm-3">
                                    <strong>DATA: {{ date('d/m/Y - H:m', strtotime($pedido->created_at)) }}</strong>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                            <h4>{{ $pedido->detalhes }}</h4>
                            <hr>
                            <p><small>
                                    <strong>Interessados: </strong>
                                    @foreach($pedido->interessados as $interessado)
                                        @if($interessado->interesse == 1)
                                            <a href="#" data-toggle="confirmation-agenda"
                                               data-pedido="{{ $pedido->id }}" data-prestador="{{ $interessado->prestador->id }}"
                                               data-title="O que deseja?">
                                                        <span class="label label-default">
                                                            {{ $interessado->prestador->nome }}
                                                            @if($interessado->contato == 'email')
                                                                <i class="fa fa-envelope"></i>
                                                            @endif
                                                            @if($interessado->contato == 'whatsapp')
                                                                <i class="fa fa-whatsapp"></i>
                                                            @endif
                                                            @if($interessado->contato == 'telefone')
                                                                <i class="fa fa-phone"></i>
                                                            @endif
                                                            @if($interessado->contato == 'celular')
                                                                <i class="fa fa-mobile-phone"></i>
                                                            @endif
                                                        </span>
                                            </a>
                                        @endif    &nbsp;
                                    @endforeach
                                </small></p>
                            <p>
                                @if( count($pedido->agendados) >0)
                                    <small>
                                        <strong>Agendados: </strong>
                                        @foreach($pedido->agendados as $agendado)
                                            <span class="label label-default"> {{ $agendado->prestador->nome }} - ({{ date('d/m/Y', strtotime($agendado->data)) }} {{ $agendado->hora }})</span>&nbsp;
                                        @endforeach
                                    </small>
                                @endif
                            </p>
                            <p>
                                <small>
                                    @if( count($pedido->orcamentos) >0)
                                        <strong>Orçamentos: </strong>
                                        @foreach($pedido->orcamentos as $orcamento)
                                            @if(!$orcamento->arquivo)
                                                <a href="#" data-toggle="modal" data-target="#show-orcamento" data-pedido="{{ $pedido->id }}" data-prestador="{{ $orcamento->prestador->id }}">
                                                    <span class="label label-default"> <i class="fa fa-eye"></i> {{ $orcamento->prestador->nome }} </span>&nbsp;
                                                </a>
                                            @else
                                                <a href="{{ Storage::disk('public')->url($orcamento->arquivo) }}" target="_blank"><span class="label label-default"> <i class="fa fa-paperclip"></i> {{ $orcamento->prestador->nome }} arquivo </span></a>
                                            @endif
                                        @endforeach
                                    @endif
                                </small>
                            </p>
                            {{--<div class="row">--}}
                                {{--<div class="col-sm-3">--}}
                                    {{--<a href="#" data-toggle="modal" data-id="{{ $pedido->id }}" data-target="#shareMail"><i class="fa fa-envelope"></i> <small>Compartilhar </small></a>&nbsp;--}}
                                {{--</div>--}}
                                {{--<div class="col-sm-3">--}}
                                    {{--<a href="#" data-target="#arquivar" data-toggle="modal" data-id="{{ $pedido->id }}"> <i class="fa fa-archive"></i> Arquivar </a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection