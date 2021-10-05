<?php

class Atendidos extends conexion{

    public function getAtendidos(){

		$instancia = conexion::obtenerconexion();
        $resultadoa = mysqli_query($instancia, "SELECT s.idsolicitud,s.fecha, c.nombres, p.pac,p.estado,s.idproducto FROM solicitud s,producto p,clientes c WHERE c.idcliente=s.idcliente and p.idproducto=s.idproducto");

        while ($consultaa = mysqli_fetch_array($resultadoa)) {
            $r[] = $consultaa;
        }
        return $r;
	}

		//   buscar atendidos
	 
	 public function findAtendidos($nombre){
		$instancia = conexion::obtenerconexion();
		$nom = $instancia->real_escape_string($nombre);

		//listar la busqueda
		$sql = "SELECT s.fecha, c.nombres, p.pac FROM solicitud s,producto p,clientes c WHERE c.idcliente=(SELECT idcliente FROM clientes WHERE nombres=".$nombre.") and p.idproducto=(SELECT idproducto FROM solicitud WHERE idcliente=(SELECT idcliente FROM clientes WHERE nombres=".$nombre.")) and s.fecha=(SELECT fecha from solicitud WHERE idcliente=(SELECT idcliente FROM clientes WHERE nombres=".$nombre."))";
		$r = [];
		$resultadoa = mysqli_query($instancia, $sql);
		var_dump($resultadoa);exit;
		while ($consultaa = mysqli_fetch_array($resultadoa)) {
			$r[] = $consultaa;
		}

		$instancia = conexion::close();
		return $r;
	  }

}

?>