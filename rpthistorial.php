
<?php
require('libs/fpdf/fpdf.php');
require('conectabd/conectarbd.php');
require('modelo/modeloafiliado.php');
require('modelo/modelopago.php');
include('libs/conversor.php');
$ci=$_REQUEST['ciaf'];

$afiliado=new Afiliado();
$afiliado->datoafiliado($ci);
$pagom=new Pago();

$reportepdf = new FPDF('P','mm','letter');
$reportepdf->AliasNbPages();
$reportepdf->AddPage();
$reportepdf->SetFont('Arial','',9);

$reportepdf->Cell(100,7,'HISTORIAL DE PAGOS','0','1','C');

$reportepdf->Cell(50,7,"Carnet de Identidad: ".$ci,'0','1','L');
$reportepdf->Cell(50,7,"Apellidos y nombres: ".$afiliado->apellidos." ".$afiliado->nombres,'0','1','L');
$reportepdf->Cell(10,5,"Fecha de Afiliacion: ".$afiliado->fechareg,'0','1','L');
$mes=date("m",strtotime($afiliado->fechareg));
$anio=date("Y",strtotime($afiliado->fechareg));
$historico=$pagom->historial($ci);
$reportepdf->SetFont('Arial','',8);
foreach ($historico as $filah) {
	$reportepdf->Cell(10,5,$filah['nropago'],'1','0','L');
	$reportepdf->Cell(35,5,date_format(date_create($filah['fechahora']),"d/m/Y H:i:s"),'1','0','L');
	$reportepdf->Cell(5,5,$filah['cantidad'],'1','0','C');
	$cant=$filah['cantidad'];
	for ($i=1;$i<=$cant;$i++){
		$reportepdf->SetX(60);

		if ($filah['idcuota']!=1)
			{$reportepdf->Cell(25,5,meslit($mes)."/".$anio,'1','0','L');}
		else
			{$reportepdf->Cell(25,5,"Afil.",'1','0','L');};
		
		$reportepdf->Cell(35,5,$filah['detalle'],'1','0','C');
		
		$reportepdf->Cell(15,5,$filah['monto'],'1','1','R');
		if ($filah['idcuota']!=1)
		   $mes++;

		if ($mes>12) {$mes=1; $anio++;};
	}
}
$reportepdf->Output();
?>

