<?php
require_once "./models/Dispositivo.php";
require_once "./view/Lista_pedidos.html";
if (isset($_GET["operacion"]) and isset($_GET["id"])) {
    if ($_GET["operacion"] == "estado") {
        $id = $_GET['id'];
        $estado = $_GET['esta'];
        $d = new Dispositivo;
        $d->cambiarEstado($id, $estado);
        require_once("./models/mail.php");
    }
}
?>