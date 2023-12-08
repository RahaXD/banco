<?php
require("../conectabd/conectarbd.php");
require("../modelo/modeloafiliado.php");

$afil= new Afiliado();
$ciafil=$_POST['cia'];
if ($ciafil!=0)
	$afil->datoafiliado($ciafil);

?>
<form name="frmequipo" action="" method="POST" enctype="multipart/form-data">
			C.I.:
			<input type="text" name="ci" id="ci" value='<?=$afil->ci; ?>' required><br>
			Apellidos:
			<input type="text" name="txtapellido" id="txtapellido" value='<?=$afil->apellidos; ?>' required><br>
			Nombre:
			<input type="text" name="txtnombre" id="txtnombre" value='<?=$afil->nombres; ?>' required><br>
			Telefono:
			<input type="text" name="txttel" id="txttel" value='<?=$afil->telefono; ?>' required><br>
			Direccion:
			<input type="text" name="txtdir" id="txtdir" value='<?=$afil->direccion; ?>' required><br>
			
			<img id='imgfoto' name='imgfoto' src='fotos/<?=$afil->foto; ?>' width="150" >
			<input type="hidden" name='fotoant' value='<?=$afil->foto; ?>' >
			<input type="file" name="lafoto" id="lafoto" ><br>
			<label for='lafoto'>Elegir Foto</label>(.JPG .PNG)	<br>

			Fecha Registro:
			<?php
			
		    if (isset($afil->fechareg))
				{$fecha=$afil->fechareg;}
				else
			    {$fecha=date("Y-m-d");};
			
			//$fecha = (isset($equi->idequipo)) ? $equi->fechareg : date("Y-m-d");

			?>
			<input type="date" name="txtfechareg" min="<?=$hoy; ?>" value="<?=$fecha; ?>"><br>
			<input type="hidden" name='op' value='<?=$ciafil; ?>'>
			<input type="Submit" name="btnguardar" id='btnguardar' value="Guardar" class="btn btn-primary">
	</form>
	<script type="text/javascript">
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
    
</script> 