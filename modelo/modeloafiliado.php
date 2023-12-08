<?php

class Afiliado
{
	var $ci;
	var $apellidos;
	var $nombres;
	var $telefono;
	var $direccion;
	var $foto;	
	var $fechareg;
	var $usrreg;
	
	private $cnx;//para la conexion
	private $tafiliado;

	function __construct()
	{
		$this->cnx=Conexion::conectar();
		$this->tafiliado=array();
	}

	public function verafiliados(){
		$afiliados=$this->cnx->query("select * from tafiliado");
		while ($fila=$afiliados->fetch_array()) {
			$this->tafiliado[]=$fila;
		}
		return $this->tafiliado;
	}

	public function datoafiliado($ciaf){
		$afiliado=$this->cnx->query("select * from tafiliado where ci='$ciaf'");
		$datos=$afiliado->fetch_object();
		
		$this->ci=$datos->ci;
		$this->apellidos=$datos->apellidos;
		$this->nombres=$datos->nombres;
		$this->telefono=$datos->telefono;
		$this->direccion=$datos->direccion;
		$this->foto=$datos->foto;
		$this->fechareg=$datos->fechareg;
		$this->usrreg=$datos->usrreg;

	}

	public function insertarafiliado($datos,$op){
		$ci=$datos[0];
		$ape=strtoupper($datos[1]);
		$nom=strtoupper($datos[2]);
		$tel=$datos[3];
		$dir=$datos[4];
		$foto=$datos[5];
		$freg=$datos[6];
		$usr=$datos[7];
		echo "foto:".$foto;
		
				if ($op!=0)
				{//actualizar
					$consulta="update tafiliado set
					apellidos='$ape',
					nombres='$nom',
					telefono='$tel',
					direccion='$dir',
					foto='$foto',
					fechareg='$freg' where ci='$ci'";
					$consedit=$this->cnx->query($consulta);
				}
				else
				{//Insertar nuevo
			
					$consulta="insert into tafiliado(ci,apellidos,nombres,telefono,direccion,foto,fechareg,usrreg)
					                            values('$ci','$ape','$nom','$tel','$dir','$foto','$freg','$usr')";
					
					$consinserta=$this->cnx->query($consulta);
				}
				
				//header("Location:index.php");
				echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=afiliado.php'>";
			
	}

	public function elimina($ciaf){
		$eliminar=$this->cnx->query("delete from tafiliado where ci='$ciaf'");
		//header("Location:afiliado.php");
		echo "<META HTTP-EQUIV='REFRESH' CONTENT='0;URL=afiliado.php'>";
	}
}
?>