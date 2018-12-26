@extends('admin.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Pedidos
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#ativo" aria-controls="home" role="tab" data-toggle="tab">Ativos</a></li>
                        <li role="presentation"><a href="#inativo" aria-controls="profile" role="tab" data-toggle="tab">Finalizados</a></li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="ativo">
                            @foreach($pedidos as $p)
                                @if($p->ativo == 1)
                                    <div class="well">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <strong>Pedido:</strong> <a href="{{ env('BACK_URL') }}/pedido/show/{{ $p->hash }}/1">#{{ $p->id }}</a>
                                            </div>
                                            <div class="col-md-7">
                                                <p><strong>Categoria:</strong> @if(isset($p->categoria)){{ $p->categoria->nome }}@endif</p>
                                            </div>
                                            <div class="col-md-3">
                                                <strong>Data:</strong> {{ $p->created_at }}
                                            </div>
                                        </div>
                                        <hr>
                                        <p>{{ $p->detalhes }}</p>
                                        <br>

                                        <div class="row">
                                            <div class="col-md-8">
                                                <small><strong>Solicitado por:</strong> {{ $p->nome }}</small>
                                            </div>
                                            <div class="col-md-3">
                                                <small><strong>Orçamentos:</strong> {{ $p->limite }}</small>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <small><strong><i class="fa fa-envelope"></i></strong> {{ $p->email }}</small>
                                            </div>
                                            <div class="col-md-3">
                                                <small><strong><i class="fa fa-mobile-phone"></i></strong> {{ $p->celular }}</small>
                                            </div>
                                            <div class="col-md-3">
                                                <small><strong><i class="fa fa-phone"></i></strong> {{ $p->fone }}</small>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p><small><strong>Tipo de serviço:</strong> <span class="label label-info">@if(isset($p->servico)){{ $p->servico->nome }}@endif</span></small></p>
                                            </div>
                                            <div class="col-md-5">
                                                <p><small><strong>Preferencia de contato:</strong> <span class="label label-danger">{{ $p->preferencia_contato }} </span></small> </p>
                                            </div>
                                            <div class="col-md-3">
                                                <p><small><strong>Cidade:</strong> {{ $p->cidade }}</small> </p>
                                            </div>
                                        </div>

                                        @if(count($p->fotos) > 0)
                                            @foreach($p->fotos as $foto)
                                                <img class="profile-img img-thumbnail img-responsive" width="100px" src="{{ Storage::disk('public')->url($foto->foto) }}">
                                            @endforeach
                                            {{--<a href="#">Fotos</a>--}}
                                        @endif
                                        @if(count($p->situacao) > 0 && $p->situacao[0]->situacao != 1)
                                            <span class="label label-warning"> {{ $p->situacao[0]->nome }} </span>
                                        @endif
                                        <hr>
                                        <p><small>
                                                <strong><small>Enviado para:</small></strong>
                                                @foreach($p->envios as $e)
                                                    <small><span class="label label-default">{{ $e->prestador->nome }}</span></small>
                                                @endforeach
                                            </small>
                                        </p>
                                        <hr>
                                        <p>
                                            <small>
                                                <strong><small>Visto por:</small></strong>
                                                @foreach($p->visitas as $v)
                                                    <small><span class="label label-default">{{ $v->prestador->nome }}</span></small>
                                                @endforeach
                                            </small>
                                        </p>
                                        <hr>
                                        <p>
                                            <small>
                                                <strong><small>Interessados:</small></strong>
                                                @foreach($p->interessados as $interessado)
                                                    @if($interessado->interesse == 1)
                                                    <small>
                                                        <span class="label label-default">
                                                            <a href="#" data-toggle="modal" data-target="#pedidoMSG" style="color: white;" data-pedido-id="{{ $p->id }}" data-prestador-id="{{ $interessado->prestador_id }}">
                                                                {{ $interessado->prestador->nome }}
                                                            </a>
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
                                                        </span>&nbsp;
                                                    </small>
                                                    @endif
                                                @endforeach
                                            </small>
                                        </p>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <a href="#" data-toggle="modal" data-id="{{ $p->id }}" data-target="#sendMail"><i class="fa fa-envelope"></i> <small>Encaminhar </small></a>&nbsp;
                                            </div>
                                            <div class="col-md-3">
                                                @if(count($p->situacao) > 0 && isset($p->situacao[0]) && $p->situacao[0]->situacao == 1)
                                                    {{--<small><span class="text-success">Realizado({{ $p->situacao[0]->prestador->nome }})</span></small>--}}
                                                @else
                                                    <a href="{{ url('/admin/pedido/mail_status',$p->id) }}">
                                                        <i class="fa fa-eye"></i> <small>Ver Situação
                                                            @if (count($p->enviosSituacao) > 0)
                                                                ({{ count($p->enviosSituacao) }} <i class="fa fa-envelope"></i> )
                                                            @endif
                                                        </small>
                                                    </a>
                                                @endif
                                            </div>
                                            <div class="col-md-3">
                                                @if(count($p->avaliacao) > 0)
                                                    <a href="#" data-toggle="modal" data-id="{{ $p->id }}" data-target="#showValuate">
                                                        <span class="text-danger"> <i class="fa fa-comment-o"></i> Avaliado</span>
                                                    </a>
                                                @else
                                                    @if(count($p->prestador) > 0)
                                                        <a href="{{ url('admin/pedido/mail_avaliacao',$p->id) }}">
                                                            @if (count($p->enviosAvaliacao) > 0)
                                                                {{ count($p->enviosAvaliacao) }}
                                                            @endif
                                                            <i class="fa fa-envelope"></i> <small>Avaliar ({{ $p->prestador[0]->nome }}) </small> </a>
                                                    @else
                                                        <div id="prestador{{ $p->id }}">
                                                            <a href="#" data-toggle="modal" data-id="{{ $p->id }}" data-target="#showPrestador">
                                                                <i class="fa fa-user-plus"></i> <small>Add prestador</small>
                                                            </a>
                                                        </div>
                                                    @endif
                                                @endif
                                            </div>
                                            <div class="col-md-3">
                                                <a href="{{ url('/admin/pedido/archive',$p->id) }}">
                                                    <i class="fa fa-archive"></i> <small>Arquivar</small>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                @endif
                            @endforeach
                        </div>
                        <div role="tabpanel" class="tab-pane" id="inativo">
                            @foreach($pedidos as $p)
                                @if($p->ativo == 0)
                                    <div class="well">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <strong>Pedido:</strong> #{{ $p->id }}
                                            </div>
                                            <div class="col-md-7">
                                                <p><strong>Categoria:</strong> {{ $p->categoria->nome }}</p>
                                            </div>
                                            <div class="col-md-3">
                                                <strong>Data:</strong> {{ $p->created_at }}
                                            </div>
                                        </div>
                                        <hr>
                                        <p>{{ $p->detalhes }}</p>
                                        <br>
                                        <p><small><strong>Tipo de serviço:</strong> <span class="label label-info">@if(isset($p->servico)){{ $p->servico->nome }}@endif</span></small></p>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <small><strong>Solicitado por:</strong> {{ $p->nome }}</small>
                                            </div>
                                            <div class="col-md-3">
                                                <small><strong><i class="fa fa-envelope"></i></strong> {{ $p->email }}</small>
                                            </div>
                                            <div class="col-md-2">
                                                <small><strong><i class="fa fa-mobile-phone"></i></strong> {{ $p->celular }}</small>
                                            </div>
                                            <div class="col-md-2">
                                                <small><strong><i class="fa fa-phone"></i></strong> {{ $p->fone }}</small>
                                            </div>
                                        </div>
                                        @if(count($p->fotos) > 0)
                                            @foreach($p->fotos as $foto)
                                                <img class="profile-img" height="100px" src="{{ Storage::disk('public')->url($foto->foto) }}">
                                            @endforeach
                                            {{--<a href="#">Fotos</a>--}}
                                        @endif
                                        @if(count($p->avaliacao) > 0)
                                            <a href="#" data-toggle="modal" data-id="{{ $p->id }}" data-target="#showValuate">
                                                <span class="label label-danger"> Avaliado </span>
                                            </a>
                                        @endif
                                        @if(count($p->situacao) > 0)
                                            <span class="label label-warning"> {{ $p->situacao[0]->nome }} </span>
                                        @endif
                                        <hr>
                                        <p><small>
                                                <strong>Enviado para:</strong>
                                                @foreach($p->envios as $e)
                                                    <span class="label label-default">{{ $e->prestador->nome }}</span>
                                                @endforeach
                                            </small>
                                        </p>
                                        <hr>
                                        <p>
                                            <small>
                                                <strong>Visto por:</strong>
                                                @foreach($p->visitas as $v)
                                                    <span class="label label-default">{{ $v->prestador->nome }}</span>
                                                @endforeach
                                            </small>
                                        </p>
                                        <hr>
                                        <p>
                                            <small>
                                                <strong>Interessados:</strong>
                                                @foreach($p->interessados as $interessado)
                                                    <span class="label label-default">{{ $interessado->prestador->nome }}</span>
                                                @endforeach
                                            </small>
                                        </p>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <a href="#" data-toggle="modal" data-id="{{ $p->id }}" data-target="#sendMail"><i class="fa fa-envelope"></i> <small>Encaminhar </small></a>&nbsp;
                                            </div>
                                            <div class="col-md-2">
                                                <a href="{{ url('/admin/pedido/mail_status',$p->id) }}">
                                                    <i class="fa fa-eye"></i> <small>Ver Situação</small>
                                                </a>
                                            </div>
                                            <div class="col-md-3">
                                                @if(count($p->prestador) > 0)
                                                    <a href="{{ url('admin/pedido/mail_avaliacao',$p->id) }}"><i class="fa fa-envelope"></i> <small>Avaliar ({{ $p->prestador[0]->nome }}) </small> </a>
                                                @else
                                                    <div id="prestador{{ $p->id }}">
                                                        <a href="#" data-toggle="modal" data-id="{{ $p->id }}" data-target="#showPrestador">
                                                            <i class="fa fa-user-plus"></i> <small>Add prestador</small>
                                                        </a>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-md-2">
                                                <a href="{{ url('/admin/pedido/destroy',$p->id) }}">
                                                    <i class="fa fa-trash"></i> <small>Excluir</small>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                @endif
                            @endforeach
                        </div>
                        {{ $pedidos->render() }}
                    </div>
                </div>
            </div>
        </div>

    </div>


    <div class="modal fade" id="sendMail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="overflow: visible;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Enviar emails</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <input type="text" name="emails" data-role="tagsinput" id="inputEmails">
                        </div><br>
                        <a href="#" id="btn-send-mail" class="btn btn-info">Enviar</a>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-default" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>

    @include('admin.pedido._prestador')
    @include('admin.pedido._avaliacao')
    @include('admin.pedido._mensagem')
@endsection