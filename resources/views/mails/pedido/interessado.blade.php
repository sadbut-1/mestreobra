<?php
    if(!isset($prestador)) { $prestador = '< seu nome/sua empresa >'; }
    if(!isset($id)) { $id = 1; }
    if(!isset($email)) { $email = 'contato@mestreobra.com.br'; }
    if(!isset($telefone)) { $telefone = '99999-8888'; }
    if(!isset($foto)) { $foto = 'prestadores/ea56eea4c1dceb4216ce9d5d108dcdb0.png'; }
    if(!isset($nome)) { $nome = 'nome-do-cliente'; }
    if(!isset($senha)) { $senha = 'X$3&0Ab'; }
    if(!isset($pedido)) { $pedido = 'Pintar casa exterior e interior metragem 120 metros.'; }
    if(!isset($mensagem)) {
        $mensagem = 'Olá, entrarei em contato o mais breve possível!';
    }
?>
        <!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <style type="text/css" rel="stylesheet" media="all">
        /* Media Queries */
        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }
    </style>
</head>

<?php

$style = [
    /* Layout ------------------------------ */

    'body' => 'margin: 0; padding: 0; width: 100%; background-color: #F2F4F6;',
    'email-wrapper' => 'width: 100%; margin: 0; padding: 0; background-color: #F2F4F6;',

    /* Masthead ----------------------- */

    'email-masthead' => 'padding: 25px 0; text-align: center;',
    'email-masthead_name' => 'font-size: 16px; font-weight: bold; color: #2F3133; text-decoration: none; text-shadow: 0 1px 0 white;',

    'email-body' => 'width: 100%; margin: 0; padding: 0; border-top: 1px solid #EDEFF2; border-bottom: 1px solid #EDEFF2; background-color: #FFF;',
    'email-body_inner' => 'width: auto; max-width: 570px; margin: 0 auto; padding: 0;',
    'email-body_cell' => 'padding: 35px;',

    'email-footer' => 'width: auto; max-width: 570px; margin: 0 auto; padding: 0; text-align: center;',
    'email-footer_cell' => 'color: #AEAEAE; padding: 35px; text-align: center;',

    /* Body ------------------------------ */

    'body_action' => 'width: 100%; margin: 30px auto; padding: 0; text-align: center;',
    'body_sub' => 'margin-top: 25px; padding-top: 25px; border-top: 1px solid #EDEFF2;',

    /* Type ------------------------------ */

    'anchor' => 'color: #3869D4;',
    'header-1' => 'margin-top: 0; color: #2F3133; font-size: 19px; font-weight: bold; text-align: left;',
    'paragraph' => 'margin-top: 0; color: #74787E; font-size: 16px; line-height: 1.5em;',
    'paragraph-sub' => 'margin-top: 0; color: #74787E; font-size: 12px; line-height: 1.5em;',
    'paragraph-center' => 'text-align: center;',

    /* Buttons ------------------------------ */

    'button' => 'display: block; display: inline-block; width: 200px; min-height: 20px; padding: 10px;
                 background-color: #3869D4; border-radius: 3px; color: #ffffff; font-size: 15px; line-height: 25px;
                 text-align: center; text-decoration: none; -webkit-text-size-adjust: none;',

    'button--green' => 'background-color: #22BC66;',
    'button--red' => 'background-color: #dc4d2f;',
    'button--blue' => 'background-color: #3869D4;',
];
?>

<?php $fontFamily = 'font-family: Arial, \'Helvetica Neue\', Helvetica, sans-serif;'; ?>

<body style="{{ $style['body'] }}">
<table width="100%" cellpadding="0" cellspacing="0">
    <tr>
        <td style="{{ $style['email-wrapper'] }}" align="center">
            <table width="100%" cellpadding="0" cellspacing="0">
                <!-- Logo -->
                <tr>
                    <td style="{{ $style['email-masthead'] }}">
                        <a style="{{ $fontFamily }} {{ $style['email-masthead_name'] }}" href="{{ env('APP_URL') }}" target="_blank">
                            <img src="{{ env('APP_URL') }}/lp/images/Logo3.png" height="50px">
                        </a>
                    </td>
                </tr>

                <!-- Email Body -->
                <tr>
                    <td style="{{ $style['email-body'] }}" width="100%">
                        <table style="{{ $style['email-body_inner'] }}" align="center" width="570" cellpadding="0" cellspacing="0">
                            <tr>
                                <td style="{{ $fontFamily }} {{ $style['email-body_cell'] }}">
                                    <!-- Greeting -->
                                    <h1 style="{{ $style['header-1'] }}">Olá {{ strtok($nome, " ") }}!</h1>

                                    <!-- Intro -->
                                    <p style="{{ $style['paragraph'] }}">
                                        O prestador {{ $prestador }} está interessado em realizar o serviço solicitado.<br>
                                    </p>
                                    <p style="{{ $style['paragraph-sub'] }}">
                                        <i>
                                            {{ $pedido }}
                                        </i>
                                    </p>
                                    <p style="background-color: #f5f5f5; padding: 5px 5px 5px 5px; font-size: 0.8em">
                                        <b>Mensagem do interessado:</b><br><br>
                                        {{ $mensagem }}
                                    </p>

                                    <!-- Action Button -->

                                    <table style="{{ $style['body_action'] }}" align="center" width="100%" cellpadding="0" cellspacing="0">
                                        <tr>
                                            <td align="center" style="background-color: #cdcdcd; padding: 5px 0px 5px 0px;" colspan="2">
                                                Caso deseje agilizar, contate o prestador.
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-left: 1px solid #cdcdcd; text-align: left;" width="100px">
                                                <img src="http://backend.mestreobra.com.br/storage/{{ $foto }}" style="max-width: 90px;">
                                            </td>
                                            <td style="border-right: 1px solid #cdcdcd; text-align: left;">
                                                <b>{{ $prestador }}</b><br>
                                                <small>E-mail: {{ $email }}</small><br>
                                                <small>Fone: {{ $telefone }}</small>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border-left: 1px solid #cdcdcd; border-bottom: 1px solid #cdcdcd;"></td>
                                            <td style="text-align: left; border-bottom: 1px solid #cdcdcd; border-right: 1px solid #cdcdcd;">
                                                @if(isset($qualificacoes))
                                                    <p style="{{ $style['paragraph-sub'] }}">
                                                        Prestador certificado com 3 referencias
                                                    </p>
                                                    <p style="{{ $style['paragraph-sub'] }}">
                                                        3 anos de experiência na área
                                                    </p>
                                                    <p style="{{ $style['paragraph-sub'] }}">
                                                        2 serviços realizados pela plataforma
                                                    </p>
                                                @endif
                                                    <p style="{{ $style['paragraph-sub'] }}">
                                                        <a href="http://www.mestreobra.com.br/empresas/show/{{ $id }}">Ver todos os detalhes de {{ $prestador }}</a>
                                                    </p>

                                            </td>
                                        </tr>
                                    </table>

                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- Footer -->
                <tr>
                    <td>
                        <table style="{{ $style['email-footer'] }}" align="center" width="570" cellpadding="0" cellspacing="0">
                            <tr>
                                <td style="{{ $fontFamily }} {{ $style['email-footer_cell'] }}">
                                    <p style="{{ $style['paragraph-sub'] }}">
                                        &copy; {{ date('Y') }}
                                        <a style="{{ $style['anchor'] }}" href="{{ env('APP_URL') }}" target="_blank">{{ config('app.name') }}</a>.
                                        Todos os direitos reservados.
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>