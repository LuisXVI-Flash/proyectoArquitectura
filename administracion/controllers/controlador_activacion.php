<?php
require_once "./models/conexion.php";
require_once "./models/Dispositivo.php";

$dispositivo = new Dispositivo;

if (isset($_GET['validarDispositivo'])) {
    echo $dispositivo->validarPac($_GET['id'], $_GET['pac']);
} elseif (isset($_POST["btnSolicitar"]) || isset($_GET['enviar'])) {
    echo 'solicitar activación';
} else {
    require_once "./view/solicitar_activacion.html";
}
