
<?php
require('libs/fpdf/fpdf.php');
require('conectabd/conectarbd.php');
require('modelo/modeloafiliado.php');
require('modelo/modelopago.php');
include('libs/conversor.php');

$pagom=new Pago();

$up=$_REQUEST['ulpg'];

$datospg=$pagom->reportepago($up);

$reportepdf = new FPDF('P','mm','letter');
$reportepdf->AliasNbPages();
$reportepdf->AddPage();

$reportepdf->SetFont('Courier','',9);

$reportepdf->Cell(100,7,'COMPROBANTE DE PAGO','0','1','C');

$reportepdf->Cell(100,8,'Número de Pago:'.$up,'0','1','C');
$reportepdf->Cell(100,8,'C.I. Afiliado:'.$datospg[1],'0','1');
$reportepdf->Cell(100,8,'Nombre Afiliado:'.$datospg[7]." ".$datospg[8],'0','1');
$reportepdf->Cell(100,8,'Fecha de Filiación: '.$datospg[12],'0','1');
$reportepdf->Cell(100,8,'Tipo de Pago: '.$datospg[16],'0','1');
$reportepdf->Cell(100,8,'Cuotas Pagadas: '.$datospg[3]." meses",'0','1');
$monto=$datospg[3]*$datospg[15];
$reportepdf->Cell(100,8,'Monto Cancelado: '.$monto." Bs",'0','1');
$reportepdf->Cell(100,8,'Son: '.convertir($monto),'0','1');
$reportepdf->Output();
?>

