<?php
require("modelo/modelopago.php");
require("modelo/modeloafiliado.php");

$afil= new Afiliado();

$datosaf=$afil->verafiliados();

$pagom=new Pago();


require("vista/vistapago.php");


if (@$_REQUEST['btnguardar']=="Pagar"){
    $datospago=array();
    $datospago[0]=$_REQUEST['ci'];//ciafiliado
    $datospago[1]=$_REQUEST['ccuotas'];//cantidad de cuotas
    $datospago[2]=$_REQUEST['tipocuota'];
    $datospago[3]=$_SESSION['usuario'];
    $up=$pagom->pagomes($datospago);//último pago
    echo "<META HTTP-EQUIV='REFRESH' CONTENT='1;URL=rptpagomensualidad.php?ulpg=".$up."'>";
}

?>