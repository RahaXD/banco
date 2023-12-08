<?php
require("modelo/modelomenu.php");

$menu=new Menu();

$opcionesmenu=$menu->opcionmenu($_SESSION['tipo']);
require("vista/vistamenu.php");
?>