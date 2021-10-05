<?php 
    

    Class Cliente extends conexion {
        public function registrar_cliente($nombres, $apellidos, $correo, $dni, $celular) {
            $consulta = "INSERT INTO clientes (nombres, apellidos, correo, dni, celular) VALUES ('$nombres', '$apellidos', '$correo', '$dni', '$celular')";
            $conexion = $this -> obtenerconexion();
            $resultado = $conexion -> query($consulta);
            $conexion -> close();
        }

        public function getcliente(){

            $instancia = conexion::obtenerconexion();
            $resultadoa = mysqli_query($instancia, "SELECT *  FROM clientes");
    
            while ($consultaa = mysqli_fetch_array($resultadoa)) {
                $r[] = $consultaa;
            }
            return $r;
        }

        public function consultar_cliente($idd){

            $instancia = conexion::obtenerconexion();
            $resultadoa = mysqli_query($instancia, "SELECT * FROM  clientes WHERE idcliente=$idd");
            $Array=[
                $resultadoa['idcliente'],
                $resultadoa['nombres'],
                $resultadoa['apellidos'],
                $resultadoa['correo'],
                $resultadoa['dni'],
                $resultadoa['celular']


            ];
        }
        public function obtener_un_cliente($id){
            $instancia = conexion::obtenerconexion();
            $resultadoa = mysqli_query($instancia, "SELECT * FROM  clientes WHERE idcliente=$id");
            $consultaxd = mysqli_fetch_array($resultadoa);
            return $consultaxd;
        }
        public function editarcliente($a, $nombres, $apellidos, $correo, $dni, $celular){
            $instancia = conexion::obtenerconexion();
            $resultadodd = mysqli_query($instancia, "UPDATE clientes SET nombres='$nombres',
            apellidos='$apellidos',correo='$correo',dni='$dni',celular='$celular' WHERE idcliente=$a");
        }
        public function eliminarcliente($a){
            $instancia = conexion::obtenerconexion();
            $resultadodd = mysqli_query($instancia, " DELETE FROM clientes WHERE idcliente = $a");
        }
    }
    function listar_cliente(){

        $instancia = conexion::obtenerconexion();
        $resultadoa = mysqli_query($instancia, "SELECT *  FROM clientes");
        
        while ($consultaa = mysqli_fetch_array($resultadoa)) {
            $r[] = $consultaa;
        }
        return $r;
    }
?>