<?php 
class modcotizacion extends CI_Model{

	function crear_cotizacion($param){
		$datos = array("idaprobacion"=>$param['aprobacion'],
						"fecha_ap"=>date("dmY"),
						"hora"=>date("h"),
						"ip_ap"=>$_SERVER['REMOTE_ADDR'],
						"unidade_ap"=>$param['unidades'],
						"total_ap"=>$param['total'],
						"nombre_ap"=>$param['nombre'],
						"apellido_ap"=>$param['apellido'],
						"telefono"=>$param['telefono'],
						"mail_ap"=>$param['email'],
						"dir_ap"=>$param['direccion'],
						"mensaje"=>$param['mensaje']
						);
		$estado = $this->db->insert('cotizacion_aprobada', $datos);

		if($estado){

			$carro = $param['carro'];
			$total_carro = count($carro);
			if($total_carro > 0){

			}
			else{
				return false;
			}
		}
	}

} ?>