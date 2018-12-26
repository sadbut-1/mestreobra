/**
 * Created by Eduardo on 30/01/2017.
 */
var prestadorId;
var categoriaId;
var tipoServicoId;

// $('.selectCategory').click(function () {
//     $('#categorias').append(
//         '<tr><td>Teste</td></tr>'
//     );
// });


$('#editPrestador').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') // Extract info from data-* attributes
    $.ajax({
        url: '/admin/prestador/edit/'+id,
        success: function (prestador) {
            console.log(prestador);
            $('#editNome').val(prestador.nome);
            $('#editAssinatura').val(prestador.assinatura);
            $('#editDetalhes').val(prestador.detalhes);
            $('#editEmail').val(prestador.email);
            $('#editCnpj').val(prestador.cnpj);
            $('#editFacebook').val(prestador.facebook);
            $('#editFone').val(prestador.fone);
            $('#editCep').val(prestador.cep);
            $('#editRua').val(prestador.rua);
            $('#editNumero').val(prestador.numero);
            $('#editBairro').val(prestador.bairro);
            $('#editComplemento').val(prestador.complemento);
            $('#editCidade').val(prestador.cidade);
            $('#editEstado').val(prestador.estado);
            $('#editIndicacoes').val(prestador.indicacoes);
            $('#editExperiencia').val(prestador.experiencia);
            $('#editSlug').val(prestador.slug);
            $('#formEditPrestador').attr('action', '/admin/prestador/update/'+id);
        }
    })
});


$('#addCategory').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    prestadorId = button.data('id') // Extract info from data-* attributes
});

$('#addTipoServico').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    prestadorId = button.data('id') // Extract info from data-* attributes
});

$('.selectCategory').on('click', function () {
    var catId = $(this).data('catid');
    $.ajax({
        url: '/admin/prestador/addCategory/'+prestadorId+'/'+catId,
        method: 'POST',
        success: function (categoria) {
            $("#pre-cat"+prestadorId).append(
                '<a href="#" data-toggle="modal" data-target="#editCategory" data-cat="'+categoria.id+'" data-pres="'+prestadorId+'">'+
                    '<span class="badge">'+categoria.nome+'</span>'+
            '</a>'
            );
            $('#addCategory').modal('toggle');
        }
    });
});

$('.selectTipoServico').on('click', function () {
    var tipoId = $(this).data('tipoid');
    $.ajax({
        url: '/admin/prestador/addTipoServico/'+prestadorId+'/'+tipoId,
        method: 'POST',
        success: function (tipo) {
            $("#pre-tipo"+prestadorId).append(
                '<a href="#" data-toggle="modal" data-target="#editCategory" data-cat="'+tipo.id+'" data-pres="'+tipoServicoId+'">'+
                '<span class="badge">'+tipo.nome+'</span>'+
                '</a>'
            );
            $('#addTipoServico').modal('toggle');
        }
    });
});

$('#editCategory').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    categoriaId = button.data('cat');
    prestadorId = button.data('pres');
    $("#servicos-list").html('');
    $.ajax({
        url: '/admin/prestador/servicos/'+prestadorId+'/'+categoriaId,
        success: function (servicos) {
            $.each(servicos, function (index, servico) {
                $("#servicos-list").append('<tr><td>'+servico.nome+'</td>'+
                    '<td><a href="#" class="removeService" data-id="'+servico.id+'"> <i class="fa fa-trash"></i> </a></td></tr>');
            });
        }
    });
    $('#excluir-categoria').attr('href', '/admin/prestador/categoria/delete/'+prestadorId+'/'+categoriaId);
});

$('#editTipoServico').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var tipoId = button.data('tipo');
    prestadorId = button.data('pres');
    $('#excluir-tipo-servico').attr('href', '/admin/prestador/tipo/delete/'+prestadorId+'/'+tipoId);
});


$('#addServiceList').on('show.bs.modal', function (event) {
    $("#servicos-add-list").html('');
    $.ajax({
        url: '/servicoPorCategoria/'+categoriaId,
        success: function (servicos) {
            $.each(servicos, function (index, servico) {
                $("#servicos-add-list").append(
                    '<tr class="addService" data-id="'+servico.id+'"><td><a href="#" > '+servico.nome+'</a></td></tr>'
                );
            });
        }
    });
});


$(document).on('click', '.addService', function () {
    var id = $(this).data('id');
    //console.log(id+' '+prestadorId);
    $.ajax({
        url: '/admin/prestador/servico/add/'+id+'/'+prestadorId,
        success: function (servico) {
            $("#servicos-list").append('<tr><td>'+servico.nome+'</td>'+
                '<td><a href="#" class="removeService" data-id="'+servico.id+'"> <i class="fa fa-trash"></i> </a></td></tr>');
            $('#addServiceList').modal('toggle');
        }
    })
});

$(document).on('click', '.removeService', function () {
    var id = $(this).data('id');
    var tr = $(this).closest('tr');
    $.ajax({
        url: '/admin/prestador/servico/rm/'+id+'/'+prestadorId,
        success: function (servico) {
            tr.remove();
            console.log("removido");
        }
    })
});

