<?php
/**
 * 
 */
class Pago
{
	var $ropago;
    var $ciaf;
    var	$fechahora;
    var	$cantidad;
    var	$idcuota;
    var	$usuario;

	private $cnx;//para la conexion
	private $pagos;
	
    function __construct()
	{
		$this->cnx=Conexion::conectar();
		$this->pagos=array();
	}

	public function pagoshechos($ciaf){

		$pagosm=$this->cnx->query("select sum(cantidad) from tmensual where ciaf='$ciaf' and idcuota=2");
		$cantpagos=$pagosm->fetch_array();
		if ($cantpagos[0]==null)
		return 0;
		else
			return $cantpagos[0];
	}

    public function deuda($ciaf){
    	//primero quiero saber cuanto ya ha pagado
		$pagosm=$this->pagoshechos($ciaf);

		$fecreg=$this->cnx->query("select fechareg from tafiliado where ci='$ciaf'");
		$fila=$fecreg->fetch_array();
		$finicio=$fila[0]; //la fecha en que empieza a ser afiliado

        $fechahoy=date("Y-m-d"); //es la fecha actual
        $datetime1=new DateTime($finicio);
        $datetime2=new DateTime($fechahoy);
 # obtenemos la diferencia entre las dos fechas
        $interval=$datetime2->diff($datetime1);
 # obtenemos la diferencia en meses
        $intervalMeses=$interval->format("%m");

        $intervalAnos = $interval->format("%y")*12;
        
        return $intervalAnos+$intervalMeses;
	}

	public function pagomes($pg){
		$ci=$pg[0];
		$cc=$pg[1];
		$tc=$pg[2];
		$us=$pg[3];
		$registropago=$this->cnx->query("insert into tmensual(ciaf,cantidad,idcuota,usuario)
										values('$ci',$cc,$tc,'$us')");
		//recupero el ùltimo id del registro
		$ultimoreg=$this->cnx->insert_id;
		return $ultimoreg;
	}

	public function reportepago($npg){//recibe el número de pago
		$reppago=array();
		$datospago=$this->cnx->query("SELECT * FROM
									tmensual m, tafiliado a, tcuota c
									WHERE m.ciaf=a.ci and m.idcuota=c.idcuota and m.nropago=$npg");
		$reppago=$datospago->fetch_array();
		return $reppago;
	}

	//metodo para verificar si pago afilicion
	public function pfiliacion($ciaf){
		$pagoaf=$this->cnx->query("select * from tmensual where ciaf='$ciaf' and idcuota=1");
		$pgaf=$pagoaf->num_rows;
		return $pgaf;
	}

	public function historial($ciaf){
		$datoshist=array();
		$hist=$this->cnx->query("select * from tmensual m, tcuota c where m.idcuota=c.idcuota and m.ciaf='$ciaf' 
			                     order by fechahora");
		while ($fh=$hist->fetch_array()) {
			$datoshist[]=$fh;
		}
		return $datoshist;
	}

}

?>