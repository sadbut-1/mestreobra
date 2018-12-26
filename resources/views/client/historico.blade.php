@extends('client.app')

@section('content')

    <div class="row">
        <div class="col-md-12">
            @if(session('message'))
                <div class="alert alert-dismissible alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>{{ session('message') }}</strong>
                </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-body" >
                    <div class="row">
                        <div class="col-sm-10">
                            <small><b>Seus histórico de pedidos</b>&nbsp;&nbsp;&nbsp;&nbsp;<a href="{{ url('/client/home') }}" class="text-info">Ver pedidos recentes</a></small>
                        </div>
                        <div class="col-sm-2">
                            <a href="{{ url('/client/pedido') }}" class="btn btn-warning">Novo pedido</a>
                        </div>
                    </div>
                    <hr>
                    <div class="col-md-12 col-sm-12">
                        @foreach($pedidos as $pedido)
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
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <a href="#" data-toggle="modal" data-id="{{ $pedido->id }}" data-target="#shareMail"><i class="fa fa-envelope"></i> <small>Compartilhar </small></a>&nbsp;
                                        </div>
                                        {{--<div class="col-sm-3">--}}
                                            {{--<a href="#" data-target="#arquivar" data-toggle="modal" data-id="{{ $pedido->id }}"> <i class="fa fa-archive"></i> Arquivar </a>--}}
                                        {{--</div>--}}
                                    </div>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                            {{ $pedidos->links() }}
                    </div> <!--end col-12 -->
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="arquivar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <h4 class="text-center">Ao arquivar seu pedido, os profissionais não poderão mais enviar propostas ou orçamentos. Tem certeza que deseja continuar?</h4>
                </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Não</button>
                        <a href="#" id="href-arquivar" class="btn btn-sm btn-success">Sim</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="shareMail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="overflow: visible;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><small>Compartilhar o andamento deste pedido com outros interessados</small></h4>
                </div>
                <div class="modal-body">
                    <small>Digite o email e pressione enter para adiciona-lo. Depois clique em enviar.</small>
                    <form>
                        <div class="form-group">
                            <input type="text" name="emails" data-role="tagsinput" id="inputEmails">
                        </div><br>
                        <a href="#" id="btn-share-mail" class="btn btn-info">Enviar</a>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

@include('client._agendar')
@include('client._perfil-prestador')
@include('client._show-orcamento')
@endsection
