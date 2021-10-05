<?php
    
    class Trabajador extends conexion {
        
        public function validarTrabajador($login,$password){
            $conexion = conexion::obtenerconexion();
            $consulta = "SELECT usuario FROM trabajadores where usuario = '$login' AND contraseña= '$password' AND estado = 1";
            
            $resultado = mysqli_query($conexion,$consulta);
            $aciertos = mysqli_num_rows($resultado);
            if($aciertos==1)
                return(1);
            else
                return(0);
        }
        public function registrarTrabajador($data) 
        {
          
          $nombre = $data['nombre'];
          $apellido =$data['apellido'];
          $idcargo =$data['idcargo'];
          $usuario =$data['usuario'];
          $pasword =$data['pasword'];
          $correo =$data['email'];

          $sql = "INSERT INTO trabajadores (`nombres`, `apellidos`, `correo`, `contraseña`, `usuario`, `idcargo_trabajador`, `estado`) VALUES ( 
            '$nombre', 
            '$apellido', 
            '$correo',
            '$pasword',
            '$usuario',
            $idcargo, 
            1           
          )";
         
          $conexion = Conexion::obtenerConexion();
          $query = mysqli_query($conexion, $sql); 

          if($query) {
              return json_encode([
                  "estado" => true,
                  "mensaje" => "Se creo usuario nuevo al sistema con éxito"
              ]);
          }
          else 
          {
               return json_encode([
                  "estado" => false,
                  "mensaje" => "No se pudo registrar el usuario"
              ]);
          }
        }
        public function verificar_usuario ($data)
        {
          $user = $data['usuario'];

          $sql = "SELECT usuario FROM trabajadores WHERE usuario = '$user' AND estado = 1";
          
          $conexion = Conexion::obtenerConexion();
          $query = mysqli_query($conexion, $sql);
          $rowCount = mysqli_num_rows($query);

          if($rowCount) {
            $row = mysqli_fetch_assoc($query);
             mysqli_free_result($query); 
             mysqli_close($conexion);
            return json_encode([
              "estado" => true,
              "usuario" => $row["usuario"]
            ]);
          }
          else 
          {
            mysqli_free_result($query);
            mysqli_close($conexion); 
            return json_encode([
              "estado" => false,
              "mensaje" => "No se encontro el usuario: {$user} "
            ]);
          }
        }
        public function actualizar_trabajador($data)
        {
          $usuario = $data['usuario']; 
          $pasword = $data['pasword'];

          $sql = "UPDATE trabajadores SET ";
          if(isset($pasword)) {
            $sql .= "contraseña = '{$pasword}'";
          }

          $sql .= " WHERE usuario = '$usuario';";


          $conexion = Conexion::obtenerConexion();
          $query = mysqli_query($conexion, $sql); 
          if($query) {
            return json_encode([
                "estado" => true,
                "mensaje" => "Se ha cambiado la contraseña con éxito."
              ]);
            }
          else
          {
            return json_encode([
              "estado" => false,
              "mensaje" => "No se pudo actualizar la contraseña.",
              'error' => mysqli_error($conexion)
            ]);
          }
        }
    }
?>