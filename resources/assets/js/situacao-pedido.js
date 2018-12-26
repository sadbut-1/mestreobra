/**
 * Created by Eduardo on 15/03/2017.
 */
$('#situacao-pedido input').on('change', function() {
    if($('input[name=situacao]:checked', '#situacao-pedido').val() == 1 ){
        $('#sim-contratou').show();
        $('#sim-realizou').show();
        $('#nao-contratou').hide();
        $('#nome-situacao').val('realizado');
    }

    if($('input[name=situacao]:checked', '#situacao-pedido').val() == 2 ){
        $('#sim-contratou').show();
        $('#nao-contratou').hide();
        $('#sim-realizou').hide();
        $('#nome-situacao').val('realizando');
    }

    if($('input[name=situacao]:checked', '#situacao-pedido').val() == 3){
        $('#nao-contratou').hide();
        $('#sim-contratou').hide();
        $('#sim-realizou').hide();
        $('#nome-situacao').val('escolhendo');
    }

    if($('input[name=situacao]:checked', '#situacao-pedido').val() == 4){
        $('#nao-contratou').show();
        $('#sim-contratou').hide();
        $('#sim-realizou').hide();
        $('#nome-situacao').val('recusado');
    }
});