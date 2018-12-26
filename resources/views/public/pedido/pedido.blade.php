@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    <div class="row">
                        @include('public.pedido._tabs')
                        <div class="col-md-4">
                            <a href="{{ url('/login') }}" class="text-success">
                            <div class="alert alert-dismissible alert-success">
                                <strong>Tem cadastro? </strong> Clique aqui para fazer seu pedido.
                            </div>
                            </a>
                            <small>
                                <h4><b>Passo a passo</b></h4>
                            <div class="list-group __timeline">
                                <div class="list-group-item">
                                    <span class="list-group-number"><b>1</b></span>
                                    <b>Solicite um orçamento</b>
                                </div>
                                <div class="list-group-item">
                                    <span class="list-group-number"><b>2</b></span>
                                    <b>Receba orçamentos das melhores empresas e prestadores da sua região </b>
                                </div>
                                <a href="#" class="list-group-item">
                                    <span class="list-group-number"><b>3</b></span>
                                    <b>Escolha a melhor oferta para você.</b>
                                </a>
                            </div>
                            </small>
                            @if($parceiros->mostrar)
                            <div class="well-form">
                                <small><p><b>Parceiros</b></p></small>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <img src="/assets/images/comarth_logo.png" class="img-responsive">
                                    </div>
                                    <div class="col-sm-6">

                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('public.pedido._fotos')
@endsection