<?php
require("modelo/modelopago.php");
//require("modelo/modeloafiliado.php");

//$afil= new Afiliado();

//$datosaf=$afil->verafiliados();

$pagom=new Pago();

$datosg=$pagom->pagosgraf();

require("vista/grafpagos.php");


?>