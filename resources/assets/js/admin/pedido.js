/**
 * Created by Eduardo on 30/01/2017.
 */
var pedidoId;

$('#showOrder').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    $.ajax({
        url: '/admin/pedido/show/'+id,
        success: function (pedido) {
            $('#detalhes_pedido').html(
                '<h4><strong>Detalhes do pedido</strong></h4>'+
                '<small><p>'+pedido.detalhes+'</p></small>'+
                '<small><p><strong>Categoria:</strong> '+pedido.categoria.nome+'</p></small>'+
                '<small><p><strong>Tipo de serviço:</strong> '+pedido.servico.nome+'</p></small>'+
                '<small><p><strong>Urgencia:</strong> '+pedido.urgencia+'</p></small>'+
                '<h4><strong>Dados do  Contato</strong></h4></small>'+
                '<small><p><strong>Nome:</strong> '+pedido.nome+'</p></small>'+
                '<small><p><strong>Email:</strong> '+pedido.email+'</p></small>'+
                '<small><p><strong>Telefone:</strong> '+pedido.fone+'</p></small>'+
                '<small><p><strong>Celular:</strong> '+pedido.celular+'</p></small>'+
                '<small><p><strong>CEP:</strong> '+pedido.cep+'</p></small>'+
                '<small><p><strong>Rua:</strong> '+pedido.rua+'</p></small>'
            );
        }
    })
});

var citynames = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    prefetch: {
        url: '/admin/prestador/list',
        filter: function(list) {
            return $.map(list, function(cityname) {
                return { name: cityname }; });
        }
    }
});
citynames.initialize();

$('inputEmails').tagsinput({
    typeaheadjs: {
        name: 'citynames',
        displayKey: 'name',
        valueKey: 'name',
        source: citynames.ttAdapter()
    }
});

$('#sendMail').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    pedidoId = button.data('id') // Extract info from data-* attributes
});

$('#btn-send-mail').click(function () {
    var dados = {
        'pedido_id': pedidoId,
        'emails': $('#inputEmails').val()
    };
    $.ajax({
        url: '/admin/pedido/email',
        type: 'POST',
        data: dados,
        success: function (emails) {
            console.log(emails);
        }
    })
   $('#sendMail').modal('hide');
});


$('#showPrestador').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    pedidoId = button.data('id') // Extract info from data-* attributes
    console.log(pedidoId);
});

$('.pedidoPrestador').on('click',function () {
    var id = $(this).data("id");
    $.ajax({
        url: '/admin/pedido/prestador/'+pedidoId+'/'+id,
        success: function (prestador) {
            $("#prestador"+pedidoId).html('<a href="/admin/pedido/mail_avaliacao/'+pedidoId+'"><i class="fa fa-envelope"></i> <small>Avaliar ('+prestador.nome+')</small> </a>');
            $('#showPrestador').modal('toggle');
        }
    })
});

$('#showValuate').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    $.ajax({
        url: '/admin/pedido/show/'+id,
        success: function (pedido) {
            $('#estrelas').html(pedido.avaliacao[0].estrelas);
            $('#comentario').html(pedido.avaliacao[0].comentario);
            $('#anonimo').html(pedido.avaliacao[0].anonimo);
        }
    })
});

$('#pedidoMSG').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var pedidoId = button.data('pedido-id')
    var prestadorId = button.data('prestador-id')
    $.ajax({
        url: '/admin/pedido/prestador/mensage/'+pedidoId+'/'+prestadorId,
        success: function (mensagem) {
            $('#prestador-mensagem').html(mensagem.mensagem);
        }
    });
})