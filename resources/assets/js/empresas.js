$('.showPortifolio').on('click', function (event) {
    id = $(this).data("id");
    $('#portifolioFotos'+id).toggle();
});

$('.fecharFotos').on('click', function (event) {
    id = $(this).data("id");
    $('#portifolioFotos'+id).hide();
});

$(document).scroll(function() {
    var y = $(this).scrollTop();
    if (y > 240) {
        $('#feedback-tab').show();
    } else {
        $('#feedback-tab').hide();
    }
});

$('#servicos-realizados').on('show.bs.modal', function (event) {
    $('#servico-realizado').html('');
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    $.ajax({
        url: '/prestador/servicos/'+id,
        success: function (prestador) {
            var estrelas = '';
            var avaliacao = 'Este serviço ainda não foi avaliado.'
            $.each( prestador.pedido, function( key, pedido ) {
                if(pedido.avaliacao.length > 0) {
                    for (var i = 0; i < pedido.avaliacao[0].estrelas; i++) {
                        estrelas += '<i class="fa fa-star" style="color: #f4c63d"></i>';
                    }
                    avaliacao = pedido.avaliacao[0].comentario;
                }
                $('#servico-realizado').append(
                    '<p class="text-center"><i>'+pedido.detalhes+'</i></p>'+

                    ' <p class="text-center" style="font-size: 0.7em">'+ estrelas+' '+avaliacao+'</p>'+
                    '<hr>'
                );
                estrelas = '';
            });
        }
    })
});

// $(function() {
//     $("#feedback-tab").click(function() {
//         $("#feedback-form").toggle("slide");
//     });
//
//     $("#feedback-form form").on('submit', function(event) {
//         var $form = $(this);
//         $.ajax({
//             type: $form.attr('method'),
//             url: $form.attr('action'),
//             data: $form.serialize(),
//             success: function() {
//                 $("#feedback-form").toggle("slide").find("textarea").val('');
//             }
//         });
//         event.preventDefault();
//     });
// });