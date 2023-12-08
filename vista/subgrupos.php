<?php

$grupo=$_POST['idg'];
$conexion= new mysqli("localhost","root","","mensualidad");
    $subgrupos=$conexion->query("select * from subgrupo where idgrp=$grupo");
    echo "<option value='0'>Elegir....</option>";
    while ($filasgrp=$subgrupos->fetch_object()) {
      echo "<option value='$filasgrp->idsubgrp'>$filasgrp->descripsg</option>";
    }

?>