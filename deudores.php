<?php
session_start();

if (isset($_SESSION['usuario']))
{
require("conectabd/conectarbd.php");
require("controlador/controladordeudor.php");
}
else
{
	echo "Usted debe iniciar Sesión...";
echo "<META HTTP-EQUIV='REFRESH' CONTENT='1;URL=index.php'>";
}
?>

