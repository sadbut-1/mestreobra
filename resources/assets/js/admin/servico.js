/**
 * Created by Eduardo on 30/01/2017.
 */
var categoriaId;

$('#editService').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    $.ajax({
        url: '/admin/servico/edit/'+id,
        success: function (servico) {
            $('#ordemService').val(servico.ordem);
            $('#nomeService').val(servico.nome);
            // $('#descService').val(servico.descricao);
            $('#formUpdateService').attr('action', '/admin/servico/update/'+id);
        }
    })
});
