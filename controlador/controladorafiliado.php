<?php

require("modelo/modeloafiliado.php");

$afil= new Afiliado();

$datosaf=$afil->verafiliados();
require_once("vista/vistaafiliado.php");

if (isset($_REQUEST['op']))
{
	switch ($_REQUEST['op']) {
		case 'new':
			require_once("vista/frmafiliado.php");
			break;
		
		case 'eli':
			$afil->elimina($_REQUEST['ciaf']);
			break;
		
		case 'edit':
			{
			$equi->datoequipo($_REQUEST['ide']);
			require_once("vista/frmafiliado.php");
			};
			break;
		default:
			# code...
			break;
	}

	
}
error_reporting(0);
if ($_REQUEST['btnguardar']=="Guardar")
{
	$datos=array();
	$datos[0]=$_REQUEST['ci'];
	$datos[1]=$_REQUEST['txtapellido'];
	$datos[2]=$_REQUEST['txtnombre'];
	$datos[3]=$_REQUEST['txttel'];
	$datos[4]=$_REQUEST['txtdir'];

	if ($_FILES['lafoto']['name']!="")
	{
		$archfoto=$_REQUEST['ci'].str_replace(' ', '_', $_REQUEST['txtapellido']).substr($_FILES['lafoto']['name'],-4);
		$datos[5]=$archfoto;
		move_uploaded_file($_FILES['lafoto']['tmp_name'],'fotos/'.$archfoto);
	}
	else
	{
		$datos[5]=$_REQUEST['fotoant'];
	}

	

	$datos[6]=$_REQUEST['txtfechareg'];
	$datos[7]=$_SESSION['usuario'];
	$op=$_REQUEST['op'];
	$afil->insertarafiliado($datos,$op);
}
?>