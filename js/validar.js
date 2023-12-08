"use strict"
$(document).ready(function() {
   $('#password2').keyup(function(){

        var pass1 = $('#password1').val();
        var pass2 = $('#password2').val();

        if(pass1 == pass2){
            $('#error2').text('Coinciden').css("color","green");
        }else{
            $('#error2').text('la contraseña no Coincide').css("color","red");
        }
        if(pass2==""){
            $('#error2').text('No puede dejar vacio').css("color","red");
        }
});

});







