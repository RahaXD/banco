<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>MENU</title>
</head>
<body>
	<?php
	echo "El usuario es: ".$_SESSION['usuario']."<br>";
	
	?>
	<a href="logout.php">Cerrar Sesion</a>
	<hr>
	<h1>MENÚ</h1>
	<?php
    //var_dump($opcionesmenu);
	foreach ($opcionesmenu as $opc) {
		echo $opc->descripcion."_".$opc->vista."<br>";
	}
	?>
</body>
</html>