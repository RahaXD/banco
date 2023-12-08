<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Grid</title>
  <link rel="stylesheet" href="grid.css">
</head>
<body class="grid-container">
  <header class="header">
  	<?php
	echo "El usuario es: ".$_SESSION['usuario']."<br>";
	
	?>
	<a href="logout.php">Cerrar Sesion</a>
  </header>
  <aside class="sidebar">
  	<h1>MENÚ</h1>
	<?php
    //var_dump($opcionesmenu);
	foreach ($opcionesmenu as $opc) {
		echo "<a href='$opc->vista' target='principal' >$opc->descripcion</a><br>";
	}
	?>

  </aside>
  <article class="main">
  	<iframe name='principal' src="main.php" frameborder="0" height="100%" width="100%"></iframe>
  </article>
  <footer class="footer">FOOTER</footer>
</body>
</html>