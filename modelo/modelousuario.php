<?php

class Usuario
{
	var $nusuario;
	var $tipo;
	var $idempleado;
	var $fechareg;
	var $usrreg;
	
 	
	private $cnx;//para la conexion
	private $tablaequipos;

	function __construct()
	{
		$this->cnx=Conexion::conectar();
		$this->tablaequipos=array();
	}

	public function verusuarios(){
		$usuarios=$this->cnx->query("select * from tusuario");
		while ($fila=$equipos->fetch_array()) {
			$this->tablaequipos[]=$fila;
		}
		return $this->tablaequipos;
	}

	public function verifica($usr,$clv){

		$clvenc=md5($clv);
		$usuario=$this->cnx->query("select * from tusuario where nusuario='$usr' and clave='$clvenc'");
		
		if ($usuario->num_rows>0)
		{
			$datos=$usuario->fetch_object();
			$this->nusuario=$datos->nusuario;
			$this->tipo=$datos->tipo;
			$this->idempleado=$datos->idempleado;
			return true;
		}
		else
			return false;
	}


	public function insertauser($datos){
		$nomuser=$datos[0];
		$clave=md5($datos[1]);
		$tipo=$datos[2];
		//$freg=$datos[3];
		$emp=$datos[3];;
		$usr=$_SESSION['usuario'];

		
		$verifica=$this->cnx->query("select * from tusuario where nusuario='$nomuser'");
		if ($verifica->num_rows==0)
			{
				$consinserta=$this->cnx->query("insert into tusuario(nusuario,clave,tipo,idempleado,usrreg)
					                            values('$nomuser','$clave','$tipo',$emp,'$usr')");
				
				
				//header("Location:index.php");
				echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=main.php'>";
			}
			else
			{
				echo "<script> alert('Ese nombre ya esta registrado...'); </script>";
			}
	}
	
}
?>