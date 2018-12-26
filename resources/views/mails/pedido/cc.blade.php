<style>
    .btn-mail {
        display: inline-block;
        padding: 6px 12px;
        margin-bottom: 0;
        font-size: 14px;
        font-weight: normal;
        line-height: 1.42857143;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        -ms-touch-action: manipulation;
        touch-action: manipulation;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        background-image: none;
        border: 1px solid transparent;
        border-radius: 4px;
    }

    .btn-primary {
        text-decoration: none;
        color: #fff;
        background-color: #337ab7;
        border-color: #2e6da4;
    }
</style>
<div class="container">

    <img src="{{ env('APP_URL') }}/lp/images/Logo3.png" height="50px">

    <h3>{{ $nome }} enviou uma nova solicitação de serviço ao Mestre Obra. <small>{{ $email }}</small></h3>

    <p>{{ $detalhes }}</p>
    <strong>Categoria:</strong> {{ $categoria }}<br>
    <strong>Tipo de Serviço</strong> {{ $tipo_de_servico }}
    <br><br>
    Equipe Mestre Obra.
    <hr>
    <a href="{{ env('APP_URL') }}" class="btn-mail btn-primary">www.mestreobra.com.br</a>

</div>