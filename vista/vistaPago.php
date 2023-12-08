<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css">
	<script src='js/jquery-3.6.4.min.js'></script>
	<script src='js/jquery.dataTables.js'></script>
	 
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/screen.css">
	<script type="text/javascript">
		$('#ccuotas').on('keyup',function(){
			alert('uy');
		});
		
    $(document).ready(function(){ //cuando el html fue cargado iniciar
    
		$("#tblafiliados").DataTable();

		
    });

//fuera del document.ready
	function datospago(ciaf){
		
		$.ajax({
          type:'POST',
          url: 'vista/frmpago.php',
          data :{
            cia : ciaf
          },
          success: function (ev){
            $('#mdpg').html(ev);
          }
        });
		
		$('#ModalPago').modal('show');
		
		}
  </script>

</head>
<body>


<!-- Modal -->
<div class="modal fade" id="ModalPago" tabindex="-1" aria-labelledby="ModalPagoLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="ModalPagoLabel">Pago Cuotas</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id='mdpg'>
        
	


      </div>
      
    </div>
  </div>
</div>


<div style='width:800px;'>
	<h1>Afiliados</h1>
	<table id='tblafiliados'>
		<thead>
		
			<tr>
				<th>C.Identidad</th> <th>Apellidos</th><th>Nombres</th><th>Telefono</th><th>Opciones</th>
			</tr>
		
		</thead>
		<tbody>
			
	<?php

		foreach ($datosaf as $registro) {
				echo "<tr><td>".$registro['ci']."</td><td>".$registro['apellidos']."</td><td>".$registro['nombres']."</td><td>".$registro['telefono']."
				</td>
                <td>
				
				<button id='mibtn' type='button' onclick='datospago(".$registro['ci'].");'>
				Pago
				</button>				
				<a href='rpthistorial.php?ciaf=".$registro['ci']."'><button type='button'>
				Historial
				</button></a>
				</td>
				</tr>";
				
			}	

	?>
	</tbody>
</table>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>

 


</body>
</html>