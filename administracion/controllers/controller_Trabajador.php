<?php

if (isset($_POST["login"]) and isset($_POST["password"])) {
    //validaciones

    $password = md5($_POST["password"]);
    $login = $_POST["login"];
    //comprobacion de trabajador
    include_once "./models/Trabajador.php";
    $objUser = new Trabajador;
    $respuesta = $objUser->validarTrabajador($login, $password);

    if ($respuesta == 0) {

        include_once "./view/formulario_Mensaje.html";
        $objMensaje = new formMensajeSistema;
        $objMensaje->formMensajeSistemaShow("No existe usuario con esos datos o esta deshabilitado", "index.php");
    } else {
        include_once "./models/Cargo_Trabajador.php";
        abrir_sesion();
        $objDetalle = new Cargo_Trabajador;
        $resultado = $objDetalle->obtenerPrivilegios($login);
        if ($resultado == 1) {

            header("Location: index.php");
        } else {
            include_once "./view/formulario_Mensaje.html";
            $objMensaje = new formMensajeSistema;
            $objMensaje->formMensajeSistemaShow("El usuario actual no cuenta con cargo", "index.php");
        }

    }
}  else if (isset($_POST["verificar_usuario"])) {
    $user = (isset($_POST["usuario"]) && !empty(trim($_POST["usuario"]))) ? $_POST["usuario"] : null;
    require_once __DIR__ . "/controladorGestionarUsuario.php";
    if (isset($user)) {
        $controlador = new controladorGestionarUsuario();
        $controlador->verificar_usuario(["usuario" => $user]);
    }
    exit;
} else {
    require_once "./view/formulario_login.html";
}
