/**
 * Created by Eduardo on 24/02/2017.
 */
$('#editUser').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    $.ajax({
        url: '/admin/usuario/edit/'+id,
        success: function (usuario) {
            $('#editUNome').val(usuario.name);
            $('#editUEmail').val(usuario.email);
            $('#editUPapel').val(usuario.role).change();
            if(usuario.empresa) {
                $('#editUEmpresa').val(usuario.empresa.id).change();
            }
            $('#formEditUser').attr('action', '/admin/usuario/update/'+id);
        }
    })
});