<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <style type="text/css">
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
</head>
<body>
    <div class="container">

        <img src="{{ env('APP_URL') }}/lp/images/Logo3.png" height="50px">

        <h3>Nova solicitação de orçamento enviada por {{ $nome }}</h3>

        <p>{{ $detalhes }}</p>
        <strong>Categoria:</strong> {{ $categoria }}<br>
        <strong>Tipo de Serviço</strong> {{ $tipo_de_servico }}
        <hr>
        <a href="{{ env('APP_URL') }}/pedido/show/{{ $hash }}/{{ $prestadorId }}" class="btn-mail btn-primary">Ver
            mais detalhes e enviar uma proposta</a>
        {{--<h4>Dados do contato</h4>--}}
        {{--<strong>Nome:</strong> {{ $nome }}<br>--}}
        {{--<strong>Email:</strong> {{ $email }}<br>--}}
        {{--<strong>Telefone:</strong> {{ $fone }}<br>--}}
        {{--<strong>Celular:</strong> {{ $celular }}<br>--}}
        {{--<strong>Preferência de contato:</strong> {{ $preferencia }}--}}

    </div>
</body>
</html>