<?php 
require "conversor.php";
if ($numero)
	 {
	 	$resultado = convertir($numero);
		print("<p>$resultado</p>");
		print("<p>");
		echo number_format($numero);
		print("</p>");
	 }
?>
<form method="POST" action="prueba.php">
  <p>
	   <input type="text" name="numero">
	   <input type="submit" value="Convertir">
	</p>
</form>
