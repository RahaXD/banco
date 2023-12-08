function Ciparapago(ciAfil) {
   $.ajax({

        type: 'POST',
        url: 'vista/frmpago.php',
        data:{
            ciAfil: ciAfil
        },
        success: function evento(e){
            $('#mdpago').html(e);
        }

    });

    $('#modalPago').modal('show');
}