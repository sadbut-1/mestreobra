$('#addTipoCategoria').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    tipoServicoId = button.data('id') // Extract info from data-* attributes
});

$('#editTipoServico').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    $.ajax({
        url: '/admin/tipo-servico/edit/'+id,
        success: function (tipo) {
            $('#tipoServicoNome').val(tipo.nome);
            // $('#catIcone').val(categoria.icone);
            $('#tipoServicoDescricao').val(tipo.descricao);
            $('#tipoServicoSlug').val(tipo.slug);
            $('#formEditTipoServico').attr('action', '/admin/tipo-servico/update/'+id);
        }
    })
});

$('.selectCategoria').on('click', function () {
    var catId = $(this).data('catid');
    $.ajax({
        url: '/admin/tipo-servico/addCategory/'+tipoServicoId+'/'+catId,
        method: 'GET',
        success: function (categoria) {
            $("#pre-tipo"+tipoServicoId).append(
                '<a href="#" data-toggle="modal" data-target="#editTipoCategoria" data-cat="'+categoria.id+'" data-pres="'+tipoServicoId+'">'+
                '<span class="badge">'+categoria.nome+'</span>'+
                '</a>'
            );
            $('#addTipoCategoria').modal('toggle');
        }
    });
});

$('#editTipoCategoria').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var tipoId = button.data('tipo');
    var categoria = button.data('cat');
    $('#excluir-tipo-categoria').attr('href', '/admin/tipo-servico/delete/'+tipoId+'/'+categoria);
});
