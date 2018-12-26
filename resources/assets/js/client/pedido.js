$("#tipo_servico").change(function () {
    $('#categorias').html('');
    var id = $("#tipo_servico option:selected").val();
    $.ajax({
        url: '/categorias-por-tipo/' + id,
        success: function (categoria) {
            console.log(categoria);
            if (categoria.length > 0) {
                $('#categorias').append('<option value="">Tipo do serviço</option>');
                $.each(categoria, function (index, value) {
                    $('#categorias').append('<option value="'+value.id+'">'+value.nome+'</option>');
                });
            }
        }
    })
});

$("#categorias").change(function () {
    $('#servicos').html('');
    var id = $("#categorias option:selected").val();
    $.ajax({
        url: '/servicos-por-categoria/' + id,
        success: function (servicos) {
            if (servicos.length > 0) {
                $('#servicos').append('<option value="">Especificação</option>');
                $.each(servicos, function (index, value) {
                    $('#servicos').append('<option value="'+value.id+'">'+value.nome+'</option>');
                });
            }
        }
    })
});

//Contador de caracteres do detalhe (O que você precisa?) do pedido
$('#detalhes').on('input', function () {
    var count = $('#detalhes').val();
    var min = parseInt(30) - parseInt(count.length);
    if (min > 0) {
        $('#contador').html('<small> <b>Faltam ' + min + ' caracteres para o mínimo requerido</b></small>');
        $('#step2-tab').addClass('disabledTab');
    } else {
        $('#contador').html('');
        $('#step2-tab').removeClass('disabledTab');
    }
});

//Verifica o CEP digitado no form de pedido
$('#cep').blur(function () {
    var cep = this.value;
    buscaCep(cep);
});

//Busca endereço do cliente pelo CEP
function buscaCep(cep) {
    $.ajax({
        url: 'http://api.postmon.com.br/v1/cep/' + cep,
        success: function (dados) {
            console.log(dados)
            $('#rua').val(dados.logradouro);
            $('#bairro').val(dados.bairro);
            $('#cidade').val(dados.cidade);
            $('#estado').val(dados.estado);

            $('#cep_invalido').html('');
        },
        error: function () {
            $('#cep_invalido').html('<small>CEP inválido</small>');
        }
    });
}

$('#voltar-pedido').on('click',function () {
    $('#dados-pessoais').hide();
    $('#dados-pedido').show();
})

//Validação formulario parte 1
$('#show-dados-pessoais').on('click', function () {
    if($('#tipo_servico').val() === ''){
        $('#error-tipo_servico').toggle();
    }
    else if($('#categorias').val() === ''){
        $('#error-categorias').toggle();
    }
    else if($('#servicos').val() === ''){
        $('#error-servicos').toggle();
    }
    else if($('#local').val() === ''){
        $('#error-local').toggle();
    }
    else if($('#detalhes').val() === ''){
        $('#error-detalhes').toggle();
    }
    else if($('#urgencia').val() === ''){
        $('#error-urgencia').toggle();
    }
    else {
        $('#dados-pedido').hide();
        $('#dados-pessoais').show();
        if($('#cep').val() === '') {
            $('#enviar_pedido').attr("disabled", true);
        }
    }
});


$('#celular').blur(function () {
    ValidarFormulario();
});

//Validação formulario parte 2
function ValidarFormulario() {
    if ($('#cep').val() ==='') {
        $('#error-cep').toggle();
    }
    else if ($('#nome').val() ==='') {
        $('#error-nome').toggle();
    }
    else if ($('#email').val() ==='') {
        $('#error-email').toggle();
    }
    else if ($('#celular').val() ==='') {
        $('#error-celular').toggle();
    } else {
        $('#enviar_pedido').attr("disabled", false);
    }
}


//Grava dados do cliente no LocalStorage para futuros pedidos
$('#enviar_pedido').click(function () {
    localStorage.setItem('cep', $('#cep').val());
    localStorage.setItem('nome', $('#nome').val());
    localStorage.setItem('email', $('#email').val());
    localStorage.setItem('fone', $('#fone').val());
    localStorage.setItem('celular', $('#celular').val());
});



