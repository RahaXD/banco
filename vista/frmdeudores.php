<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
	<script src='js/jquery-3.6.4.min.js'></script>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/screen.css">
	<script type="text/javascript">
		
		
    $(document).ready(function(){ //cuando el html fue cargado iniciar
    
		$('#grupo').change(function (){
            var idgrp=$('#grupo').val();
            $.ajax({
                type : 'POST',
                url : 'vista/subgrupos.php',
                data:{
                    idg : idgrp
                },
                success: function(ev){
                    $('#subgrupo').html(ev);
                }
            });
        });

        $('#subgrupo').change(function (){
            var idsubgrp=$('#subgrupo').val();
            
           
            $.ajax({
                type : 'POST',
                url : 'vista/detalle.php',
                data:{
                    idsg : idsubgrp
                },
                success: function(ev){
                    $('#detalle').html(ev);
                }
            });
            
        });
		
    });

  </script>

</head>
<body>

Seleccion de Detalle:<br>
GRUPO:
<select name="grupo" id="grupo">
<option value="0">Elegir....</option>
    <?php
    $conexion= new mysqli("localhost","root","","mensualidad");
    $grupos=$conexion->query("select * from grupo");
    while ($filagrp=$grupos->fetch_object()) {
      echo "<option value='$filagrp->idgrp'>$filagrp->descrip</option>";
    }
    
    ?>
    
</select>

<div>
    SubGrupo:
    <select name="subgrupo" id="subgrupo">


    </select>
</div>
<div>
    Detalle:
    <select name="detalle" id="detalle">


    </select>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

 


</body>
</html>