<?php
require_once "../modelos/conexion.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($data)) {
        //funcion agregar solicitud
        if(isset($data["idproducto"]) && isset($data["pacproducto"])&& isset($data["nombres"])&& isset($data["apellidos"])&& isset($data["correo"])&& isset($data["telefono"])&& isset($data["dni"])){
            $conex = new conexion;
            $conexion = $conex::obtenerconexion();
            $val1=trim($data["idproducto"]);
            $val2=trim($data["pacproducto"]);
            $val3=trim($data["nombres"]);
            $val4=trim($data["apellidos"]);
            $val5=trim($data["correo"]);
            $val6=trim($data["telefono"]);
            $val7=trim($data["dni"]);
            $sql="INSERT INTO clientes(nombres, apellidos,correo, dni, celular) VALUES ('{$val3}','{$val4}','{$val5}','{$val7}','{$val6}')";
            
            if(mysqli_query($conexion,$sql)){
                $sql = "SELECT idcliente FROM clientes WHERE dni='{$val7}'";
                $result=mysqli_fetch_array(mysqli_query($conexion,$sql));
                $var8=$result["idcliente"] ;
                $sql="SELECT idproducto FROM producto WHERE id='{$val1}'";
                
                $result=mysqli_fetch_array(mysqli_query($conexion,$sql));
                $var9=$result["idproducto"];

                date_default_timezone_set("America/Lima");
                $var10=date("Y-m-d H:i:s");
                $sql="INSERT INTO solicitud (fecha, idproducto, idcliente) VALUES ('{$var10}','{$var9}','{$var8}')";
               
                if(mysqli_query($conexion,$sql)){
                    echo json_encode("1");
                }
            }else{
                echo json_encode("0");
            }
        }
        //funcion validar producto
        if (isset($data["idproducto"]) && isset($data["pacproducto"])&& !isset($data["nombres"])&& !isset($data["apellidos"])&& !isset($data["correo"])&& !isset($data["telefono"])&& !isset($data["dni"])) {

            $valor1 = trim($data["idproducto"]);
            $valor2 = trim($data["pacproducto"]);

            $conex = new conexion;
            $conexion = $conex::obtenerconexion();
            $sql = "SELECT * from producto WHERE id = '{$valor1}' AND pac='{$valor2}' AND estado='0'";
            $array = mysqli_query($conexion, $sql);
            $resultado = mysqli_fetch_array($array);

            if ($resultado) {
                echo json_encode("1");
            } else {
                echo json_encode("0");
            }


        } else {
            if (isset($data["idproducto"]) && !isset($data["pacproducto"])&& !isset($data["nombres"])&& !isset($data["apellidos"])&& !isset($data["correo"])&& !isset($data["telefono"])&& !isset($data["dni"])) {
                $valor = trim($data["idproducto"]);

                $conex = new conexion;
                $conexion = $conex::obtenerconexion();
                $sql = "SELECT * from producto WHERE id = '{$valor}' ";

                $array = mysqli_query($conexion, $sql);
                $resultado = mysqli_fetch_array($array);

                if ($resultado) {
                    echo json_encode("1");
                } else {
                    echo json_encode("0");
                }
            }

            if (!isset($data["idproducto"]) && isset($data["pacproducto"])&& !isset($data["nombres"])&& !isset($data["apellidos"])&& !isset($data["correo"])&& !isset($data["telefono"])&& !isset($data["dni"])) {
                // $valor = filter_var($data["pacproducto"], FILTER_SANITIZE_STRING);

                $valor = $data["pacproducto"];
                $conex = new conexion;
                $conexion = $conex::obtenerconexion();
                $sql = "SELECT * from producto WHERE pac = '{$valor}' ";

                $array = mysqli_query($conexion, $sql);

                $resultado = mysqli_fetch_array($array);

                if ($resultado) {
                    echo json_encode("1");
                } else {
                    echo json_encode("0");
                }
            }
        }
        exit();
    }

}
