@extends('client.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    Meus dados
                </div>
                <div class="card-body">
                    <div class="section">
                        <div class="section-body">
                            <div class="media social-post">
                                <div class="media-body">
                                    <div class="media-content">
                                        @if(isset($cliente->cnpj))
                                            <p><strong>CNPJ:</strong> {{ $cliente->cnpj }}</p>
                                        @endif
                                        {{--<div class="row">--}}
                                            {{--<div class="col-sm-6">--}}
                                                {{--@if(isset($cliente->usuario->email))--}}
                                                    {{--<p><strong>E-mail:</strong> {{ $cliente->usuario->email }}</p>--}}
                                                {{--@endif--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        <div class="row">
                                            <div class="col-sm-6">
                                                @if(isset($cliente->telefone))
                                                    <p><strong>Fone:</strong> {{ $cliente->telefone }}</p>
                                                @endif
                                            </div>
                                            <div class="col-sm-5">
                                                @if(isset($cliente->celular))
                                                    <p><strong>Celular:</strong> {{ $cliente->celular }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                @if(isset($cliente->rua) && $cliente->rua != '')
                                                    <p><strong>Rua:</strong> {{ $cliente->rua }}</p>
                                                @endif
                                            </div>
                                            <div class="col-sm-2">
                                                @if(isset($cliente->numero) && $cliente->numero != '')
                                                    <p><strong>Num.:</strong> {{ $cliente->numero }}</p>
                                                @endif
                                            </div>
                                            <div class="col-sm-2">
                                                @if(isset($cliente->complemento) && $cliente->complemento != '')
                                                    <p><strong>Comp.:</strong> {{ $cliente->complemento }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                @if(isset($cliente->bairro) && $cliente->bairro != '')
                                                    <p><strong>Bairro:</strong> {{ $cliente->bairro }}</p>
                                                @endif
                                            </div>
                                            <div class="col-sm-3">
                                                @if(isset($cliente->cep) && $cliente->cep != '')
                                                    <p><strong>CEP:</strong> {{ $cliente->cep }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                @if(isset($cliente->cidade) && $cliente->cidade != '')
                                                    <p><strong>Cidade:</strong> {{ $cliente->cidade }}</p>
                                                @endif
                                            </div>
                                            <div class="col-sm-3">
                                                @if(isset($cliente->estado) && $cliente->estado != '')
                                                    <p><strong>Uf:</strong> {{ $cliente->estado }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="media-action">
                                        <a href="#" data-id="{{ $cliente->id }}" data-toggle="modal" data-target="#edit-perfil-cliente"><i class="fa fa-edit"> Alterar</i></a>&nbsp
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('client._editData')
@endsection