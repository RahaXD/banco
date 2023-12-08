<?php
require("../conectabd/conectarbd.php");
require("../modelo/modeloafiliado.php");
require("../modelo/modelopago.php");

$afil= new Afiliado();

$afil->datoafiliado($_POST['cia']);

$pago= new Pago();

//verifi9car si pago la afilicion

$pf=$pago->pfiliacion($_POST['cia']);//pago afiliacion

if ($pf>0)
{
$npagos=$pago->pagoshechos($_POST['cia']);


$mesesaf=$pago->deuda($_POST['cia']);

$deuda=$mesesaf-$npagos;

?>

<form name="frmpago" action="" method="POST">
			C.I.:
			<input type="text" name="ci" id="ci" value='<?=$_POST['cia'];?>' readonly><br>
			<?=$afil->apellidos;?><br>
			Cuotas Pagadas: <?=$npagos;?>
			<input type="hidden" name="tipocuota" value='2'>
			Meses de Afiliacion:  <?=$mesesaf;?> <br>
			<b>Deuda:<?php
			if($deuda<0) 
				{
					echo "Tiene ".$deuda*(-1)." cuotas adelantadas";
				}
				else
					echo $deuda;
				;
			?></b><br>
			Cuotas a Pagar:<input type="number" name ="ccuotas" id="ccuotas" min='1' step='1'>
			<hr>
			<input type="Submit" name="btnguardar" id='btnguardar' value="Pagar" class="btn btn-primary">
</form>
<?php
 }

else
{
?>

<form name="frmpago" action="" method="POST">
			C.I.:
			<input type="text" name="ci" id="ci" value='<?=$_POST['cia'];?>' readonly><br>
			<?=$afil->apellidos;?><br>
			
			<input type="hidden" name="tipocuota" value='1'>
			DEBE REALIZAR PRIMERO EL PAGO POR AFILIACION
			<input type="hidden" name ="ccuotas" id="ccuotas" value='1'>
			<hr>
			<input type="Submit" name="btnguardar" id='btnguardar' value="Pagar" class="btn btn-primary">
</form>

<?php
}
?>