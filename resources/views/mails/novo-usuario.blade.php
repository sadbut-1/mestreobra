<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    @include('mails.style')
</head>
<body>
<div class="container">

    <img src="{{ env('APP_URL') }}/lp/images/Logo3.png" height="50px">

    <h3>Olá {{ strtok($nome, " ") }}!</h3>

    Seu cadastro foi realizado com sucesso e sua área administrativa do Mestre Obra já está disponível.<br>
    Nela você pode:<br>
        - Conferir os serviços disponíveis para sua categoria.<br>
        - Incluir ou alterar dados do seu cadastro e apresentação no site.<br>
        - Inserir fotos do seu portifólio.<br>
        - Alterar sua senha<br>

    <p><strong>Usuário:</strong> {{ $email }}</p>
    <p><strong>Senha:</strong> {{ $senha }}</p>

    <p>Você pode acessar sua área clicando no botão (link) abaixo:</p>
    <hr>
    <a href="http://www.mestreobra.com.br/login" class="btn-mail btn-primary">Área Administrativa</a>

    {{--<p>Também pode verificar seu perfil acessando: </p><a href="{{ env('APP_URL') }}/servicos-construcao-civil">www.mestreobra.com.br/servicos-construcao-civil</a>--}}

</div>
</body>
</html>