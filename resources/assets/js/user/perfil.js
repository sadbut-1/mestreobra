
$('#editMain').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    $.ajax({
        url: '/prestador/edit/'+id,
        success: function (prestador) {
            $('#editPNome').val(prestador.nome);
            $('#editPAssinatura').val(prestador.assinatura);

            $('#formEditMain').attr('action', '/prestador/update/'+id);
        }
    })
});


$('#editDetail').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    $.ajax({
        url: '/prestador/edit/'+id,
        success: function (prestador) {
            $('#editPDetalhe').val(prestador.detalhes);

            $('#formEditDetail').attr('action', '/prestador/update/'+id);
        }
    })
});

$('#editData').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    $.ajax({
        url: '/prestador/edit/'+id,
        success: function (prestador) {
            $('#editCnpj').val(prestador.cnpj);
            $('#editEmail').val(prestador.email);
            $('#editFone').val(prestador.fone);
            $('#editCep').val(prestador.cep);
            $('#editRua').val(prestador.rua);
            $('#editNumero').val(prestador.numero);
            $('#editComplemento').val(prestador.complemento);
            $('#editBairro').val(prestador.bairro);
            $('#editCidade').val(prestador.cidade);
            $('#editEstado').val(prestador.estado);

            $('#formEditData').attr('action', '/prestador/update/'+id);
        }
    })
});

$('#addPrestadorPictures').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    $('#presId').val(id);
});

$('#addPrestadorPictures').on('hidden.bs.modal', function () {
    window.location.reload(true);
});

$('#rmPrestadorPictures').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    $.ajax({
        url: '/prestador/fotos/show/'+id,
        success: function (foto) {
            console.log(foto);
            $('#fotoPortifolioShow').html('<img src="/storage/'+foto.foto+'" style="max-width: 450px; display: block;margin-left: auto;margin-right: auto;">');
            $('#descricaoFoto').val(foto.descricao);

            $('#excluirFoto').attr('href', '/prestador/fotos/destroy/'+id)
            $('#formEditFoto').attr('action', '/prestador/fotos/update/'+id)
        }
    })
});

$('#editSocialLinks').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    $.ajax({
        url: '/prestador/edit/' + id,
        success: function (prestador) {
            $('#editPFacebook').val(prestador.facebook);

            $('#formEditSocial').attr('action', '/prestador/update/'+id);
        }
    });
});
