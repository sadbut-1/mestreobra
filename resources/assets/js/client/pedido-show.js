var PrestadorMensagemId = 0;

$('.prestador-mensagem').on('click', function () {
    var pedidoId = $(this).data("pedido-id");
    var prestadorId = $(this).data('prestador-id');
    PrestadorMensagemId = prestadorId;
    console.log(PrestadorMensagemId)
    var prestadorNome = $(this).data('prestador-nome');
    $('#titulo-prestador-nome').html(prestadorNome);
    $('.chat').html('');
    $.ajax({
        url: '/client/mensagem/porPrestador/'+pedidoId+'/'+prestadorId,
        success: function (mensagens) {
            if(mensagens.length > 0) {
                $.each( mensagens, function( key, mensagem ) {
                        var li = '<li>';
                        if (mensagem.cliente) {
                            li = '<li class="right">';
                        }
                        $('.chat').append(
                            li +
                            '<div class="message">' + mensagem.mensagem + '</div>' +
                            '<div class="info">' +
                            '<div class="datetime">' + mensagem.created_at + '</div>' +
                            '<div class="status"><i class="fa fa-check" aria-hidden="true"></i> Read</div>' +
                            '</div>' +
                            '</li>'
                        )
                });
            } else {
                $('.chat').html('<li class="line"><div class="title">Esta prestador esta interessado no serviço, mas ainda não enviou nenhuma mensagem.</div></li>');
            }
        }
    })
});

$('#enviar-mensagem').on('click',function () {
    var pedidoId = $(this).data("pedido-id");
    var prestadorId = 0;
    if(PrestadorMensagemId === 0) {
        prestadorId = $(this).data("prestador-id");
    } else {
        prestadorId = PrestadorMensagemId;
    }
    $.ajax({
        url: '/client/mensagem/nova',
        method: 'POST',
        data: {
            'pedido_id': pedidoId,
            'prestador_id': prestadorId,
            'cliente': 1,
            'mensagem': $('#texto-mensagem').val( )
        },
        success: function (mensagem) {
            $('.chat').append(
                '<li class="right">'+
                '<div class="message">' + $('#texto-mensagem').val() + '</div>' +
                '<div class="info">' +
                '<div class="datetime">' + '08/06/2017' + '</div>' +
                '</div>' +
                '</li>'
            )
            $('#texto-mensagem').val('');
            console.log(mensagem)
        }
    })

});
