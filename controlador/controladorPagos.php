<?php

require 'modelo/modeloafiliados.php';
require 'modelo/modelopagos.php';

$paciente= new Afiliados();

$datos=$paciente->verPaciente();

$pagomen= new Pagos();

require_once("vista/vistaPago.php");

if( isset($_REQUEST['btnpagar'])){
 
    if(isset($_REQUEST['btnpagar'])=="Pagar"){

    $datos=array();
    $datos[0]=$_SESSION['usuario'];
    $datos[1]=$_REQUEST['idcuota'];
    $datos[2]=$_REQUEST['ccuota'];
    $datos[3]=$_REQUEST['ci'];
    $datos[4]=$_REQUEST['multa'];

   $upago = $pagomen->insertarPago($datos);

   echo "<meta http-equiv='refresh' content='0;url=rptMensualidad.php?Up=$upago'>";
   }
 

}

?>