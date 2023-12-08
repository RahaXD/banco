<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
 	<script src='js/jquery-3.6.4.min.js'></script>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/screen.css">
	<script>
		function abremodal(ciaf){
			$.ajax({
          type:'POST',
          url: 'vista/frmafiliado.php',
          data :{
            cia : ciaf
          },
          success: function (ev){
            $('#modalafil').html(ev);
          }
        });
			$('#exampleModal').modal('show');
		}
		
	</script>
<style type="text/css">

input[type='file']#lafoto {
 width: 0.1px;
 height: 0.1px;
 opacity: 0;
 
 position: absolute;
 z-index: -1;
 }

 label[for="lafoto"] {
 font-size: 12px;
 font-weight: 600;
 color: #fff;
 background-color: #106BA0;
 display: inline-block;
 transition: all .5s;
 cursor: pointer;
 padding: 8px 12px ;
 text-transform: uppercase;
 width: fit-content;
 text-align: center;
 }
</style>

</head>
<body>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick='abremodal(0);'>
 Nuevo
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Registro de Afiliado</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id='modalafil'>
      

	  
      </div>
      
    </div>
  </div>
</div>


<div style='width:700px;'>
	<h1>Datos de los Afiliados</h1>
	<table>
		<th>
			<tr>
				<th>C.Identidad</th> <th>Apellidos</th><th>Nombres</th><th>Telefono</th><th>Foto</th><th>Opciones</th>
			</tr>
		</th>
	
	<?php
	$f=1;
		foreach ($datosaf as $registro) {
				echo "<tr><td>".$registro['ci']."</td><td>".$registro['apellidos']."</td><td>".$registro['nombres']."</td><td>".$registro['telefono']."
				</td><td width=150>
				<a data-bs-toggle='collapse' href='#lafoto$f' role='button' aria-expanded='false' aria-controls='lafoto$f'>
				verFoto
				</a>
				<div class='collapse' id='lafoto$f'>
  <div class='card card-body'>
   <img src='fotos/".$registro['foto']."' width='100'></td>
  </div>
</div>

								

				<td><a href=\"?op=ver&ide=".$registro['ci']."\">Ver</a>
				<a href=\"?op=eli&ciaf=".$registro['ci']."\" 
				onclick=\"return confirm('Seguro que desea aeliminarlo?')\">Eliminar</a> |
				
				
				<button id='btnmodal' onclick='abremodal(".$registro['ci'].");'>Editar</button>
				</td>
				</tr>";
				$f++;
			}	

	?>
</table>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

 


</body>
</html>