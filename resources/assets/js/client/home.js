/**
 * Created by Eduardo on 11/04/2017.
 */
var agendaPedidoId;
var agendaPrestadorId;

$('[data-toggle=confirmation-agenda]').confirmation({
    rootSelector: '[data-toggle=confirmation]',
    buttons: [
        {
            class: 'btn btn-danger',
            //icon: 'glyphicon glyphicon-usd',
            label: 'Ver perfil',
            onClick: function() {
                $('#perfil-prestador').modal('show');
                $.ajax({
                    url: '/client/prestador/show/'+agendaPrestadorId,
                    success: function (prestador) {
                        $('#perfilTitulo').html(prestador.nome);
                        $('#perfilCNPJ').html(prestador.cnpj);
                        $('#perfilEmail').html(prestador.email);
                        $('#perfilFone').html(prestador.fone);
                        $('#perfilRua').html(prestador.rua);
                        $('#perfilNum').html(prestador.numero);
                        $('#perfilComp').html(prestador.complemento);
                        $('#perfilBairro').html(prestador.bairro);
                        $('#perfilCEP').html(prestador.cep);
                        $('#perfilCidade').html(prestador.cidade);
                        $('#perfilUf').html(prestador.estado);
                        $('#perfilDetalhes').html(prestador.detalhes);
                        //console.log(prestador);
                    }
                });
            }
        },
        {
            class: 'btn btn-primary',
            //icon: 'glyphicon glyphicon-euro',
            label: 'Agendar',
            onClick: function() {
                $('#agendar').modal('show');
                $('#agendaPedidoId').val(agendaPedidoId);
                $('#agendaPrestadorId').val(agendaPrestadorId);
            }
        }
    ]
});


$('[data-toggle=confirmation-agenda]').on('show.bs.confirmation', function (event) {
    agendaPedidoId = $(this).data('pedido');
    agendaPrestadorId = $(this).data('prestador');
    console.log(agendaPedidoId);
    console.log(agendaPrestadorId);
});

$('#show-orcamento').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var pedido = button.data('pedido');
    var prestador = button.data('prestador') ;
    $.ajax({
        url: '/client/prestador/show/'+prestador,
        success: function (prestador) {
            $('#orcamentoNome').html(' '+prestador.nome);
            $('#orcamentoCNPJ').html(prestador.cnpj);
            $('#orcamentoEmail').html(prestador.email);
            $('#orcamentoFone').html(prestador.fone);
            $('#orcamentoRua').html(prestador.rua);
            $('#orcamentoNum').html(prestador.numero);
            $('#orcamentoComp').html(prestador.complemento);
            $('#orcamentoBairro').html(prestador.bairro);
            $('#orcamentoCEP').html(prestador.cep);
            $('#orcamentoCidade').html(prestador.cidade);
            $('#orcamentoUf').html(prestador.estado);
            //console.log(prestador);
        }
    });
    $.ajax({
        url: '/client/orcamento/show/'+pedido+'/'+prestador,
        success: function (orcamento) {
            console.log(orcamento);
            $('#orcamentoDetalhes').html(orcamento.detalhes);
            $('#orcamentoTotal').html('<strong>TOTAL R$ '+orcamento.total+'</strong>');
        }
    });
});

$('#arquivar').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var id = button.data('id');
    $('#href-arquivar').attr('href', '/client/pedido/archive/'+id);
});

var pedidoId;

$('#shareMail').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    pedidoId = button.data('id') // Extract info from data-* attributes
});

$('#btn-share-mail').click(function () {
    var dados = {
        'pedido_id': pedidoId,
        'emails': $('#inputEmails').val()
    };
    $.ajax({
        url: '/client/pedido/share',
        type: 'POST',
        data: dados,
        success: function (emails) {
            console.log(emails);
        }
    })
    $('#shareMail').modal('hide');
});

$('#avaliar-prestador').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    $.ajax({
        url: '/client/pedidoAjax/show/'+id,
        success: function (pedido) {

            console.log(pedido);
        }
    });
})