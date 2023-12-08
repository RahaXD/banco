<?php

class Conexion{
	public static function conectar(){
		$conexion= new mysqli("localhost","root","","mensualidad");
		return $conexion;
	}
}
?>