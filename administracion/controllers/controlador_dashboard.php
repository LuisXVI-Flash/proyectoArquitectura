<?php

if (isset($_POST['uwu'])) {

    $instancia = conexion::obtenerconexion();
    $fecha = date("Y-m-d") . "%";
    $resultadoa = mysqli_query($instancia, "SELECT COUNT(*) FROM `solicitud` WHERE fecha like '{$fecha}'");
    $solhoy = mysqli_fetch_array($resultadoa);

} else {
    require_once "./models/Dispositivo.php";
    $dis = new Dispositivo;
    $dispositivos = $dis->getProductos();

    $disActivos = $dis->getProductosActivos();
    $disInactivos = $dis->getProductosInactivos();

    $instancia = conexion::obtenerconexion();
    $fecha = date("Y-m-d") . "%";
    $resultadoa = mysqli_query($instancia, "SELECT COUNT(*) FROM `solicitud` WHERE fecha like '{$fecha}'");
    $solhoy = mysqli_fetch_array($resultadoa);
}

?>