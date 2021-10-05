<?php

require_once "../models/conexion.php";
require_once "../models/Cliente.php";
$method = $_SERVER['REQUEST_METHOD'];

if ($method == "GET") {
    if (!empty($_GET['id'])) {
        $api = new Cliente();
        $obj = $api->getcliente();

        $json = json_encode($obj);
        echo $json;

    } else {
        $vector = array();
        $api = new Cliente();
        $vector = $api->getcliente();

        $json = json_encode($vector);
        echo $json;
    }
}

?>