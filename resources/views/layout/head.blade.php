<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Mestre Obra - Solicite o serviço desejado</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/vendor.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/flat-admin.css') }}">

    <!-- Theme -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/theme/blue-sky.css') }}">

    <!--Plugins-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/dropzone.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/galleria.classic.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/galleria.classic.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/css/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/plugins/summernote/dist/summernote.css') }}">

    <!--Fonts-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/assets/fonts/flaticon.css') }}">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
