$(document).ready(function() {
$("#nombre").keyup(function(){
    var nombrep=$("#nombre").val();
    $.ajax({
    data:{ nombre:nombrep
            
     },
    url: 'proceso.php',
    type: 'POST',
    success:function(response){
            $('#errorname').html(response).css("color","red");
            if(response !=""){
                $("#btninsertar").prop('disabled',true);
            }
            else{
                $("#btninsertar").prop('disabled',false);
            }
         }

    });
});
});

