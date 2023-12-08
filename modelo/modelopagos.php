<?php

class Pagos
{
    var $nropago;
    var $fechahora;
    var $userreg;
    var $idcuota;
    var $cantidad;
    var $ci;
    var $multa;

    private $conex;
    private $tablaMensualidad;

  function __construct(){

    $this->conex=Conexion::conectarbd();
    $this->tablaMensualidad=array();
  }

  public function Datosdecuotapag($ciAfiliado)
  {
    $cuotam = $this->conex->query("SELECT * FROM `tpaciente` WHERE ci='$ciAfiliado'");
    $datos=$cuotam->fetch_array();

    if($datos[0] == null){
      return 0;
    }else{
      return $datos[0];
      
    }
  }

  public function insertarPago($datos){

    $userreg = $datos[0];
    $idcuota=$datos[1]; 
    $ccuota=$datos[2];
    $ci=$datos[3];
    $multa =$datos[4];

    $insertMensualidad = $this->conex->query("INSERT INTO tmensualidad(userreg, idcuota, cantidad, ci,multa) VALUES ('$userreg',$idcuota,$ccuota,'$ci',$multa)");
    
  $pagoActual = $this->conex->insert_id;

  return $pagoActual;
	}   
}
?>