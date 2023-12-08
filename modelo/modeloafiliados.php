<?php

class Afiliados
{
    var $ci;
    var $paterno;
    var $materno;
    var $nombre;
    var $nrocarpeta;

    private $conex;
    private $tabla;

  function __construct(){

    $this->conex=Conexion::conectarbd();
    $this->tabla=array();
  }
  public function verPaciente()
  {
    $afiliados = $this->conex->query("CALL SPPACIENTEEST();");
    while($fila=$afiliados->fetch_array()){

        $this->tabla[]=$fila;
    }
    
    return $this->tabla;
  }

  public function datospaciente($ci)
  {
    $dtp=$this->conex->query("SELECT * FROM tpaciente  WHERE CI='$ci'");
    $datos=$dtp->fetch_object();
    $this->ci=$datos->ci;
    $this->paterno=$datos->paterno;
    $this->materno=$datos->materno;
    $this->nombres=$datos->nombres;
    $this->nrocarpeta=$datos->nrocarpeta;
    $this->fechanac=$datos->fechanacimiento;
  }
}

?>