<?php

$subgrupo=$_POST['idsg'];
$conexion= new mysqli("localhost","root","","mensualidad");
$detalle=$conexion->query("select * from detalle where idsg=$subgrupo");
echo "<option value='0'>Elegir....</option>";
while ($fdet=$detalle->fetch_object()) {
    echo "<option value='$fdet->iddet'>$fdet->descdetalle</option>";
}

?>