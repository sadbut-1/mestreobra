
$('.show-detalhes').on('click', function () {
    var id = $(this).data("id"); // Extract info from data-* attributes
    $.ajax({
        url: '/pedido/visto/'+id,
        success: function (pedido) {
            $('#pedido-detalhes'+id).removeAttr('hidden');
            $('#pedido-acoes'+id).removeAttr('hidden');
            $('#ver-mais'+id).hide();
        }
    })

});

$('#contato-por').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var pedido = button.data('pedido');
    var prestador = button.data('prestador') ;
    $('#contato-pedido').val(pedido);
    $('#contato-prestador').val(prestador);
});

$('#pedido-orcamento').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var pedido = button.data('pedido');
    var prestador = button.data('prestador') ;
    $('#orcamento-pedido').val(pedido);
    $('#orcamento-prestador').val(prestador);
    $('#orcamentoTitulo').html(pedido)
});

$(document).ready(function() {
    $('#summernote').summernote({
        minHeight: 200,             // set minimum height of editor
        maxHeight: null,             // set maximum height of editor
        focus: true,
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']]
        ]
    });
});

