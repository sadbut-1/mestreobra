@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if(session('message'))
                <div class="alert alert-dismissible alert-success">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>{{ session('message') }}</strong>
                </div>
            @endif
            <div class="card">
                @if($pedido)
                    @if($pedido->ativo == 0)
                        <div class="card-body">
                            <div class="well">
                                <h3>Este pedido ja foi realizado.</h3>
                            </div>
                        </div>
                    @else
                        @if(count($interessados) <= $pedido->limite || $prestadorInteressado)
                            <div class="card-body">
                            <div class="well">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4><strong>Detalhes do pedido #{{ $pedido->id }}</strong></h4>
                                        <p>{{ $pedido->detalhes }}</p>
                                        <strong>Categoria:</strong> @if(isset($pedido->tipo->nome)){{ $pedido->tipo->nome }}@endif<br>
                                        <strong>Tipo de Serviço</strong>@if(isset($pedido->categoria->nome)) {{ $pedido->categoria->nome }} @endif
                                        <br><strong>Preferência de contato:</strong>
                                        <span class="label label-warning">{{ $pedido->preferencia_contato }}</span>
                                        <br><strong>Interessados:</strong> {{ count($interessados) }}
                                        <br>
                                    </div>
                                    @if($prestadorInteressado)
                                        <div class="col-md-6">
                                            <h4><strong>Dados do Cliente</strong></h4>
                                            <small><strong>Nome:</strong> {{ $pedido->nome }}</small>
                                            <br>
                                            <small><strong>Email:</strong> {{ $pedido->email }}</small>
                                            <br>
                                            @if(isset($pedido->fone))
                                                @if($pedido->preferencia_contato == 'telefone')
                                                    <small><strong>Telefone:</strong> {{ $pedido->fone }}</small>
                                                @endif
                                                <br>
                                            @endif
                                            @if($pedido->preferencia_contato == 'celular')
                                                <small><strong>Celular:</strong> {{ $pedido->celular }}</small>
                                                <br>
                                            @endif
                                        </div>
                                    @else
                                        <div class="col-md-6">

                                            <small>
                                                Os dados do cliente serão disponibilizados apenas para quem clicar no botão <strong>Tenho interesse</strong>. Localizado mais abaixo <i class="fa fa-long-arrow-down"></i> .
                                            </small>

                                        </div>
                                    @endif
                                </div>
                                <hr>
                                @if($prestadorInteressado)
                                    @if(!session('message'))
                                        <div class="alert alert-success">
                                            Seu interesse ja foi registrado no dia {{ date('d/m/Y - h:m', strtotime($prestadorInteressado->created_at)) }}.
                                        </div>
                                    @endif
                                @else
                                    @if(!session('message'))
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <a href="#" data-toggle="modal" data-target="#contato-por" class="btn btn-info">Tenho interesse</a>
                                            </div>
                                            <div class="col-sm-3">
                                                <form action="/pedido/interesse" method="POST">
                                                    {{ csrf_field() }}
                                                    <input type="text" name="pedido_id" value="{{ $pedido->id }}" hidden>
                                                    <input type="text" name="prestador_id" value="{{ $prestador->id }}" hidden>
                                                    <input type="text" name="interesse" value="0" hidden>
                                                    <button type="submit" class="btn btn-sm btn-default">Não tenho interesse</button>
                                                </form>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                                <hr>
                                    @if(count($pedido->fotos) > 0)
                                    <p><strong>Fotos:</strong></p>
                                        @foreach($pedido->fotos as $foto)
                                            <img class="profile-img img-thumbnail img-responsive" width="400px" src="{{ Storage::disk('public')->url($foto->foto) }}">
                                        @endforeach
                                    @endif
                            </div>
                            <hr>

        {{--                    <a href="{{ url('/pedido/visita', [$pedido->id,$prestador->id]) }}" class="btn btn-danger">Não tenho interesse</a>--}}

                        </div>
                        @else
                            <div class="card-body">
                                <div class="well">
                                    <h3>Este pedido ja atingiu o limite de interessados.</h3>
                                </div>
                            </div>
                        @endif
                    @endif
                @else
                    <div class="card-body">
                        <div class="well">
                            <h3>Este pedido foi excluído da nossa plataforma.</h3>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    @if($pedido)
        @include('mail-urls._modal_email')
    @endif

@endsection