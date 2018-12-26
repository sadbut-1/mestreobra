@extends('app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="well-form">
                                <h2 class="text-center" style="color: #42b4f2">Pedido enviado com sucesso!</h2>
                                <h1 class="text-center" style="color: #42b4f2"><i class="fa fa-check" aria-hidden="true"></i></h1>
                                <p class="text-center">Sua soliciatação foi enviada para os melhores profissionais da região e logo
                                    eles entrarão em contato por <strong>e-mail</strong> ou <strong>telefone</strong>.
                                </p><br>
                                <p class="text-center">Caso ainda não possua um usuário. Um <strong>link de acesso</strong> e uma <strong>senha</strong> foram enviados para seu <strong>e-mail</strong>. Assim poderá acompanhar o
                                    andamento do seu pedido, ver a ficha completa dos profissionais interessados e avalia-los.
                                </p><br>
                                <div class="text-center">
                                    <a href="{{ url('/servicos-construcao-civil') }}" class="btn btn-lg btn-info">Voltar</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <h3>Passo a passo</h3><br>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="margin-top: 100px;"></div>
    <script>
        fbq('init', '1317313288328484');
        fbq('track', 'InitiateCheckout');
    </script>
@endsection