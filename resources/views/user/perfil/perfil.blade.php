@extends('user.app')

@section('content')
    @if(isset($prestador) && $prestador != null)
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body app-heading">
                            <img class="profile-img" src="{{ Storage::disk('public')->url($prestador->foto) }}">
                            <div class="app-title">
                                <div class="title"><span class="highlight">{{ $prestador->nome }}</span></div>
                                <div class="description">{{ $prestador->assinatura }}</div>
                                <div class="description"><a href="#" data-id="{{ $prestador->id }}" data-toggle="modal" data-target="#editMain"><i class="fa fa-edit"> Alterar</i></a>&nbsp; </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><br>
            @if (session('message'))
                <div class="alert alert-{{ session('color') }} alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{ session('message') }}
                </div>
            @endif
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div role="tabpanel" class="tab-pane active" id="tab1">
                                <div class="row">
                                    <div class="col-md-3 col-sm-12">
                                        <div class="section">
                                            <div class="section-title"><i class="icon fa fa-user" aria-hidden="true"></i> Categorias</div>
                                            <div class="section-body __indent">
                                                @foreach($prestador->categorias as $cat)
                                                    {{ $cat->nome }}
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="section">
                                            <div class="section-title"><i class="icon fa fa-book" aria-hidden="true"></i> Tipos de Serviço</div>
                                            <div class="section-body __indent">
                                                {{--@foreach($prestador->servicos as $serv)--}}
                                                {{--@endforeach--}}
                                            </div>
                                        </div>
                                        <div class="section">
                                            <div class="section-title"><i class="icon fa fa-book" aria-hidden="true"></i> Social</div>
                                            <div class="section-body __indent">
                                                @if(isset($prestador->facebook))
                                                   <h1><a href="{{ $prestador->facebook }}"><i class="fa fa-facebook-square"></i></a></h1>
                                                @endif
                                                    <a href="#" data-id="{{ $prestador->id }}" data-toggle="modal" data-target="#editSocialLinks"><i class="fa fa-edit"> Alterar Links</i></a>
                                            </div>
                                        </div>
                                        <div class="section">
                                            <div class="section-title"><i class="icon fa fa-book" aria-hidden="true"></i> Usuário</div>
                                            <div class="section-body __indent">
                                                <a href="#" data-id="{{ $prestador->id }}" data-toggle="modal" data-target="#editPassword"><i class="fa fa-edit"> Alterar Senha</i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-9 col-sm-12">
                                        <div class="section">
                                            <div class="section-title">Descrição da Empresa</div>
                                            <div class="section-body">
                                                <div class="media social-post">
                                                    <div class="media-body">
                                                        <div class="media-content">{{ $prestador->detalhes }}</div>
                                                        <div class="media-action">
                                                            <a href="#" data-id="{{ $prestador->id }}" data-toggle="modal" data-target="#editDetail"><i class="fa fa-edit"> Alterar</i></a>&nbsp
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="section">
                                            <div class="section-title">Dados cadastrais</div>
                                            <div class="section-body">
                                                <div class="media social-post">
                                                    <div class="media-body">
                                                        <div class="media-content">
                                                            @if(isset($prestador->cnpj))
                                                                <p><strong>CNPJ:</strong> {{ $prestador->cnpj }}</p>
                                                            @endif
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    @if(isset($prestador->email))
                                                                        <p><strong>E-mail:</strong> {{ $prestador->email }}</p>
                                                                    @endif
                                                                </div>
                                                                <div class="col-sm-5">
                                                                    @if(isset($prestador->fone))
                                                                        <p><strong>Fone:</strong> {{ $prestador->fone }}</p>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    @if(isset($prestador->rua) && $prestador->rua != '')
                                                                        <p><strong>Rua:</strong> {{ $prestador->rua }}</p>
                                                                    @endif
                                                                </div>
                                                                <div class="col-sm-2">
                                                                    @if(isset($prestador->numero) && $prestador->numero != '')
                                                                        <p><strong>Num.:</strong> {{ $prestador->numero }}</p>
                                                                    @endif
                                                                </div>
                                                                <div class="col-sm-2">
                                                                    @if(isset($prestador->complemento) && $prestador->complemento != '')
                                                                        <p><strong>Comp.:</strong> {{ $prestador->complemento }}</p>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    @if(isset($prestador->bairro) && $prestador->bairro != '')
                                                                        <p><strong>Bairro:</strong> {{ $prestador->bairro }}</p>
                                                                    @endif
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    @if(isset($prestador->cep) && $prestador->cep != '')
                                                                        <p><strong>CEP:</strong> {{ $prestador->cep }}</p>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    @if(isset($prestador->cidade) && $prestador->cidade != '')
                                                                        <p><strong>Cidade:</strong> {{ $prestador->cidade }}</p>
                                                                    @endif
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    @if(isset($prestador->estado) && $prestador->estado != '')
                                                                        <p><strong>Uf:</strong> {{ $prestador->estado }}</p>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="media-action">
                                                            <a href="#" data-id="{{ $prestador->id }}" data-toggle="modal" data-target="#editData"><i class="fa fa-edit"> Alterar</i></a>&nbsp
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="section">
                                            <div class="section-title">Portfólio</div>
                                            <div class="section-body">
                                                <div class="media social-post">
                                                    <div class="media-body">
                                                        <div class="media-content">
                                                            <div class="attach">
                                                                @foreach($prestador->fotos as $foto)
                                                                    <a href="#" data-toggle="modal" data-target="#rmPrestadorPictures" data-id="{{$foto->id}}" class="thumbnail">
                                                                        <img src="{{ Storage::disk('public')->url($foto->foto) }}" style="max-height: 100px;min-height: 50px; min-width: 60px">
                                                                    </a>
                                                                @endforeach
                                                            </div>
                                                            <p><a href="#" data-toggle="modal" data-target="#addPrestadorPictures" data-id="{{$prestador->id}}"><i class="fa fa-camera"></i> Adicionar foto(s)</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="section" hidden>
                                            <div class="section-title">Avaliações</div>
                                            <div class="section-body">
                                                <div class="media social-post">
                                                    <div class="media-body">
                                                        @foreach($prestador->pedido as $pedido)
                                                            @if(isset($pedido->avaliacao[0]))
                                                                <p>{{ $pedido->avaliacao[0]->estrelas }}</p>
                                                                <p>{{ $pedido->avaliacao[0]->comentario }}</p>
                                                                <hr>
                                                            @endif
                                                        @endforeach
                                                        {{--<div class="media-content">{{ $prestador->detalhes }}</div>--}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body app-heading">
                                Nenhuma empresa associada a este usuário
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @include('user.perfil._editMain')
    @include('user.perfil._editDetails')
    @include('user.perfil._editData')
    @include('user.perfil._addPictures')
    @include('user.perfil._rmPictures')
    @include('user.perfil._editSocialLinks')
    @include('user.perfil._editPassword')


@endsection
