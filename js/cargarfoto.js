

$("#lafoto").change(function () {
     filePreview(this);
 });
 function filePreview(input) {
     if (input.files && input.files[0]) {
     var reader = new FileReader();
     reader.onload = function (e) {
         $('#imgfoto').attr("src",e.target.result);
        }
     reader.readAsDataURL(input.files[0]);
     }
 }
 


$('#lafoto').change(function(){
filePreview(this);
});

function filePreview(input) {
     if(input.files && input.files[0]){

          var leer = new FileReader();
          leer.onload=function(e){
               $('#imgfoto').attr("src",e.target.result);
          }
          leer.readAsDataURL(input.files[0]);
     }
}
