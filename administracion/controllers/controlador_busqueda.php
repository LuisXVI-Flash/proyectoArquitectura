<?php
require_once "../models/conexion.php";
require_once "../models/Dispositivo.php";
$method = $_SERVER['REQUEST_METHOD'];

if ($method == "POST") {
    $json = null;
    $data = json_decode(file_get_contents("php://input"), true);
    $producto = $data['producto'];
    $api = new Dispositivo();
    $obj = $api->findProduct($producto);
    $json = json_encode($obj);
    echo $json;
}

if ($method == "GET") {
    if (!empty($_GET['id'])) {
        $api = new Dispositivo();
        $obj = $api->getProductos();

        $json = json_encode($obj);
        echo $json;

    } else {
        $vector = array();
        $api = new Dispositivo();
        $vector = $api->getProductos();

        $json = json_encode($vector);
        echo $json;
    }
}
?>