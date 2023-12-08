<?php

session_start();

if(isset ($_SESSION['usuario'])){

    require 'conectarbd/conexion.php';
    require 'controlador/controladorPagos.php';
}

else{

    echo '<p class="text-center h3">Acesso denegado debes Iniciar Sesion....</p>';
    echo "<meta http-equiv='refresh' content='1;url=index.php'>";
}


?>