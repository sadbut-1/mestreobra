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

        .btn-default {
            text-decoration: none;
            color: #4f4f4f;
            background-color: #d6d3d5;
            border-color: #b1b2ae;
        }
    </style>
</head>
<body>
<div class="container">

    <img src="{{ env('APP_URL') }}/lp/images/Logo3.png" height="50px">

    <h3>Olá {{ strtok($nome, " ") }} tudo bem?</h3>

    <p>Vimos que seu pedido foi visualizado pelas seguintes empresas:</p>
    <ul>
        @foreach($visualizacoes as $v)
            <li>{{ $v->prestador->nome }}</li>
        @endforeach
    </ul>

    <p>Algum profissional ja entrou em contato com você?</p>
    <hr>
    <a href="{{ env('APP_URL') }}/pedido/situacao/{{ $hash }}/1" class="btn-mail btn-primary">SIM</a>&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="{{ env('APP_URL') }}/pedido/situacao/{{ $hash }}/2" class="btn-mail btn-default">NÃO</a>&nbsp;&nbsp;&nbsp;&nbsp;
</div>
</body>
</html>