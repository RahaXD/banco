<?php

require("modelo/modelousuario.php");
$usr=new Usuario();
require_once("vista/frmUsuario.php");

if (isset($_REQUEST['btnRegistrar']))//=="Registrar")
{
    $datos[0]=$_REQUEST['nomUsuario'];
    $datos[1]=$_REQUEST['password1'];
    $datos[2]=$_REQUEST['tipoUser'];
    $datos[3]=$_REQUEST['cboempleados'];
    if ($datos[1]==$_REQUEST['password2'])
    {
    $usr->insertauser($datos);
    }
    else
    {
        echo "Las claves no coinciden";
    }
}
?>

