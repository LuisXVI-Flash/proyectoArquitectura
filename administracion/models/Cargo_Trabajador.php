<?php
    
    class Cargo_Trabajador extends conexion{
        public function ECargo(){
            $this -> conectar();
        }
        public function obtenerPrivilegios($login){
            $conexion = conexion::obtenerconexion();
            $consulta = "SELECT C.idcargo_Trabajador, C.Tipo_Trabajador,T.nombres FROM cargo_trabajador C, trabajadores T 
                         WHERE C.idcargo_Trabajador = T.idcargo_Trabajador and T.usuario = '$login'";

            $resultado = mysqli_query($conexion,$consulta);

            $datos = array();
            if($row = mysqli_fetch_array($resultado)){
                
                $_SESSION['idcargo']=$row[0];
                $_SESSION['nombreCargo']=$row[1];
                $_SESSION['trabajador']=$row[2];
                return 1;
            }else{
                return 0;
            }
        }
    }
?>