<?php

$conexion= new mysqli("localhost","root","","bdequipos");
$id=$_POST['idequipo'];
$n=strtoupper($_POST['nombre']);
$cns="select * from tequipo where nombre='$n' and idequipo!=$id";
echo $cns;
$verifica=$conexion->query($cns);
if ($verifica->num_rows>0)
	echo "<p style='color:red;'>Ese nombre ya existe..</p>";
?>