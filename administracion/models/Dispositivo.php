<?php

class Dispositivo extends conexion{
	private $id;
	private $pac;
	private $estado; 



	public function __construct(){
		$args = func_get_args();
		$nargs = func_num_args();
		switch($nargs){
			case 1:
				self::__construct1($args[0], $args[1], $args[2]);
				break;
			case 2:
				self::__construct2();
				break;
		}
	}

	public function __construct1($id_,$pac_,$estado_){
		$this->id=$id_;
		$this->pac=$pac_;
		$this->estado=$estado_;
	}

	public function __construct2(){
	}

	public function agregar($id,$pack,$estado){

			
			$consulta = "INSERT INTO producto(id,pac,estado) VALUES ('$id', '$pack', '$estado')";
			
			$conexion = $this -> obtenerconexion();
            $resultado = $conexion -> query($consulta);
            $conexion -> close();
        
	}
	public function getProductos(){

		$instancia = conexion::obtenerconexion();
        $resultadoa = mysqli_query($instancia, "SELECT *  FROM producto");

        while ($consultaa = mysqli_fetch_array($resultadoa)) {
            $r[] = $consultaa;
        }
        return $r;
	}
	public function getProductosActivos(){

		$instancia = conexion::obtenerconexion();
        $resultadoa = mysqli_query($instancia, "SELECT COUNT(*)  FROM producto where estado='1'");

        $consultaa = mysqli_fetch_array($resultadoa);
        return $consultaa;
	}
	public function getProductosInactivos(){

		$instancia = conexion::obtenerconexion();
        $resultadoa = mysqli_query($instancia, "SELECT  COUNT(*)  FROM producto where estado='0'");
		$consultaa = mysqli_fetch_array($resultadoa);
        
        return $consultaa;
	}
	 
	 public function findProduct($nombre){
		$instancia = conexion::obtenerconexion();
		$nom = $instancia->real_escape_string($nombre);
		$sql = "SELECT * FROM producto where pac like '%".$nom."%'";
		$r = [];
		$resultadoa = mysqli_query($instancia, $sql);
		while ($consultaa = mysqli_fetch_array($resultadoa)) {
			$r[] = $consultaa;
		}
		$instancia = conexion::close();
		return $r;
	  }
	  
	  public function cambiarEstado($id,$estado){
		$instancia = conexion::obtenerconexion();
		$sql = mysqli_query($instancia,"UPDATE producto SET estado=$estado WHERE idproducto=$id");
	  }

	public function obtener_un_dispositivo($id){
		$instancia = conexion::obtenerconexion();
		//si tienes error cambiar idproducto por id
		$sql="SELECT * FROM  producto WHERE idproducto=$id";
		$resultadoa = mysqli_query($instancia, $sql);
		
		$consultaxd = mysqli_fetch_array($resultadoa);
		
		//var_dump('<pre>',$consultaxd,'</pre');
		return $consultaxd;
	}

	public function editardispositivo($idproducto,$id,$pac,$estado){
		$instancia = conexion::obtenerconexion();
        $resultadodd = mysqli_query($instancia, "UPDATE producto SET id='$id',
    	pac='$pac',estado='$estado' WHERE idproducto=$idproducto");
	}
	public function eliminardispositivo($a){
		$instancia = conexion::obtenerconexion();
		$resultadodd = mysqli_query($instancia, " DELETE FROM producto WHERE idproducto = $a");
	}

	public function validarPac($id,$pac) {
		$instancia = conexion::obtenerconexion();
		$sql = "SELECT * FROM producto where id=".$id." and pac='". $pac . "'";
		$resultados = mysqli_query($instancia, $sql);
		$instancia = conexion::close();
		return mysqli_num_rows($resultados);
	}
}
?>