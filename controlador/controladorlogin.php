<?php

require("modelo/modelousuario.php");

$usuario=new Usuario();

require("vista/frmlogin.php");

if (isset($_REQUEST['btnlogin'])){

	$ver=$usuario->verifica($_REQUEST['txtusr'],$_REQUEST['txtclv']);

	if  ($ver)
	 {
	 	echo "Acceso concedido...";
	 	$_SESSION['tipo']=$usuario->tipo;
	 	$_SESSION['usuario']=$usuario->nusuario;
	 	$_SESSION['idemp']=$usuario->idempleado;

	 	echo "<META HTTP-EQUIV='REFRESH' CONTENT='1;URL=menu.php'>";
	 }
	else
	{
		echo "error en Usuario y/o contraseña...";
	}
}

?>