@extends('user.app')

@section('content')
<div class="row">
<div class="col-md-12">
    @if(session('message'))
        <div class="alert alert-dismissible alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>{{ session('message') }}</strong>
        </div>
    @endif
    <div class="panel panel-info">
        <div class="panel-body">
            <div class="section">
                <div class="section-title">Serviços que estou interessado</div>
                <div class="section-body">
                    <div class="media social-post">
                        <div class="media-body">
                            @if(isset($interesses) && count($interesses) > 0)
                                @foreach($interesses as $p)
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
                                                <div id="pedido-detalhes{{ $p->id }}">
                                                    <p>
                                                        <small>
                                                            <strong>Tipo de serviço:</strong>
                                                            <span class="label label-info">@if(isset($p->servico)){{ $p->servico->nome }}@endif</span>
                                                        </small>
                                                    </p>
                                                    <div>
                                                        <small><strong>Solicitado
                                                                por:</strong> {{ $p->nome }}</small>
                                                    </div>
                                                    <div>
                                                        <small>
                                                            <strong><i class="fa fa-envelope"></i></strong> {{ $p->email }}
                                                        </small>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <small>
                                                                <strong>
                                                                    <i class="fa fa-mobile-phone"></i>
                                                                </strong> {{ $p->celular }}
                                                            </small>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <small>
                                                                <strong>
                                                                    <i class="fa fa-phone"></i>
                                                                </strong> {{ $p->fone }}
                                                            </small>
                                                        </div>
                                                    </div>
                                                    {{--@if(count($p->fotos) > 0)--}}
                                                    {{--<a href="#">Fotos</a>--}}
                                                    {{--@endif--}}
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-md-11" id="ver-mais{{ $p->id }}">
                                                        @if( count($p->interessados) >= $p->limite)
                                                            Pedido fechado
                                                        @else
                                                            @if($p->orcamentos->isEmpty())
                                                            <div class="row">
                                                                <div class="col-sm-3">
                                                                    <a class="btn btn-sm btn-primary" href="#" data-target="#pedido-orcamento"
                                                                       data-toggle="modal" data-pedido="{{ $p->id }}" data-prestador="{{ Auth::user()->empresa->id }}">
                                                                        Criar orçamento
                                                                    </a>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <form action="/orcamento/create" method="POST" enctype="multipart/form-data">
                                                                        {{ csrf_field() }}
                                                                        <input type="hidden" name="pedido_id"  value="{{ $p->id }}">
                                                                        <input type="hidden" name="prestador_id"  value="{{ Auth::user()->empresa->id }}">
                                                                        <input type="hidden" name="detalhes" value="Orçamento anexo"></input>
                                                                        <input type="hidden" name="subtotal" value="0">
                                                                        <input type="hidden" name="desconto" value="0">
                                                                        <input type="hidden" name="total"    value="0">
                                                                        <input type="hidden" name="validade" value="0">
                                                                        <div class="row">
                                                                            <div class="col-sm-7" style="background-color: #f4f4f4;padding: 10px 10px 10px 10px">
                                                                                <label for="arquivo">Anexar orçamento</label>
                                                                                <input type="file" id="arquivo" name="arquivo">
                                                                            </div>
                                                                            <div class="col-sm-2" style="background-color: #f4f4f4;padding: 10px 10px 11px 10px">
                                                                                <button type="submit" class="btn btn-sm btn-info">Enviar</button>
                                                                            </div>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            @else
                                                                Orçamento enviado - {{ date('d/m/Y', strtotime($p->orcamentos[0]->created_at)) }}
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
@include('user._orcamento')
@endsection