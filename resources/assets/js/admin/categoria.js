/**
 * Created by Eduardo on 30/01/2017.
 */

$('#editCategoria').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    $.ajax({
        url: '/admin/categoria/edit/'+id,
        success: function (categoria) {
            $('#catNome').val(categoria.nome);
            $('#catIcone').val(categoria.icone);
            $('#catDescricao').val(categoria.descricao);
            $('#catSlug').val(categoria.slug);
            $('#formEditCategoria').attr('action', '/admin/categoria/update/'+id);
        }
    })
});

$('#addServico').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    categoriaId = button.data('id') // Extract info from data-* attributes
});

$('.selectServico').on('click', function () {
    var servicoId = $(this).data('servico');
    $.ajax({
        url: '/admin/categoria/addServico/'+categoriaId+'/'+servicoId,
        method: 'GET',
        success: function (servico) {
            $("#pre-catserv"+categoriaId).append(
                '<a href="#" data-toggle="modal" data-target="#editServico" data-serv="'+servico.id+'" data-cat="'+categoriaId+'">'+
                '<span class="badge">'+servico.nome+'</span>'+
                '</a>'
            );
            $('#addServico').modal('toggle');
        }
    });
});

$('#editServico').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var servico = button.data('serv');
    var categoria = button.data('cat');
    $('#excluir-servico').attr('href', '/admin/categoria/rmServico/'+categoria+'/'+servico);
});
