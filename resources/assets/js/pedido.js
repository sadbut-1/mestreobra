//Busca dados do cliente no LocalStorage caso ele ja tenha preenchido o formulário alguma outra vez
$(document).ready(function () {
    var cep = localStorage.getItem('cep');
    $('#cep').val(localStorage.getItem('cep'));
    $('#nome').val(localStorage.getItem('nome'));
    $('#email').val(localStorage.getItem('email'));
    $('#fone').val(localStorage.getItem('fone'));
    $('#celular').val(localStorage.getItem('celular'));
    if (cep) {
        buscaCep(cep);
        $('#como-conheceu').hide();
    }

});

//Busca os tipos de serviço de acordo com a categoria escolhida
$("#categoria").change(function () {
    $('#servicos').html('');
    var id = $("select option:selected").val();
    $.ajax({
        url: '/servicoPorCategoria/' + id,
        success: function (categoria) {
            if (categoria.length > 0) {
                $('#servicos').append('<label>Tipo do serviço</label>');
                $.each(categoria, function (index, value) {
                    $('#servicos').append(
                        '<div class="radio" style="background-color: rgba(252,252,252,0.96); padding: 6px 6px 6px 0px;">' +
                        '<input type="radio" name="servico_id" id="servico' + value.id + '" value="' + value.id + '">' +
                        '<label for="servico' + value.id + '">' +
                        value.nome +
                        '</label>' +
                        '</div>'
                    );
                });
            }
        }
    })
});

//Efeito de passo-a-passo da TAB do pedido
$('#proximo').click(function () {
    $('.step li').removeClass('active');
    $('#cc').toggle();
});

//Verifica o CEP digitado no form de pedido
$('#cep').blur(function () {
    var cep = this.value;
    buscaCep(cep);
});

//Mostra Com cópia para
$('#showCC').click(function () {
   $('#cc').toggle();
});

//Grava dados do cliente no LocalStorage para futuros pedidos
$('#enviar_pedido').click(function () {
    localStorage.setItem('cep', $('#cep').val());
    localStorage.setItem('nome', $('#nome').val());
    localStorage.setItem('email', $('#email').val());
    localStorage.setItem('fone', $('#fone').val());
    localStorage.setItem('celular', $('#celular').val());
    ValidarFormulario();
});

//Contador de caracteres do detalhe (O que você precisa?) do pedido
$('#detalhes').on('input', function () {
    var count = $('#detalhes').val();
    var min = parseInt(30) - parseInt(count.length);
    if (min > 0) {
        $('#contador').html('<small> Faltam ' + min + ' caracteres para o mínimo requerido</small>');
        $('#step2-tab').addClass('disabledTab');
    } else {
        $('#contador').html('');
        $('#step2-tab').removeClass('disabledTab');
    }
});

//Busca endereço do cliente pelo CEP
function buscaCep(cep) {
    $.ajax({
        url: 'http://api.postmon.com.br/v1/cep/' + cep,
        success: function (dados) {
            $('#rua').val(dados.logradouro);
            $('#bairro').val(dados.bairro);
            $('#cidade').val(dados.cidade);
            $('#estado').val(dados.estado);

            $('#enviar_pedido').attr("disabled", false);
            $('#cep_invalido').html('');
        },
        error: function () {
            $('#enviar_pedido').attr("disabled", true);
            $('#cep_invalido').html('<small>CEP inválido</small>');
        }
    });
}
function ValidarFormulario() {
    if($('#categoria').val() == ''){
        $('#step1-tab').tab('show');
        $('#errocategoria').html('<small>Escolha uma categoria.</small>');
    }
    if($('#detalhes').val() == ''){
        $('#step1-tab').tab('show');
    }
    if($('#detalhes').val().length < 30){
        $('#step1-tab').tab('show');
    }
}

//Mascaras do formulário
jQuery(function($){
    $("#cep").mask("99999-999");
    $("#fone").mask("(99) 9999-9999");
    $("#celular").mask("(99) 99999-9999");
});





