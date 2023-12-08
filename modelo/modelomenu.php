<?php
/**
 * 
 */
class Menu
{
	var $descripcion;
	var $vistaopcion;

	private $cnx;//para la conexion
	private $opciones;
	function __construct()
	{
		$this->cnx=Conexion::conectar();
		$this->opciones=array();
	}

	public function opcionmenu($tipo){
		$opcs=$this->cnx->query("SELECT descripcion, vista FROM tmenu m, rmenuusuario mu
								 WHERE m.idopcion=mu.idopcion and mu.tipousr='$tipo'");
		while ($fila=$opcs->fetch_object()) {
			$this->opciones[]=$fila;
		}
		return $this->opciones;

	}
}

?>