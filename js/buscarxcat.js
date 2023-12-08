
"use strict"
$(document).ready(function() {

    $('#cmbcat').change(function(){
        var idcat=$(this).val();
        $.ajax({
        data:{ idcat:idcat },
        url: 'buscarxcat.php',
        type: 'POST',
        success:function(resp){
              $('#vercat').html(resp);
             }
    
        });
    });



});

function imprime() {
    var idcat=$('#cmbcat').val();
     window.open('vista/informeRepuestos.php?cate='+idcat);
 }
 
 





