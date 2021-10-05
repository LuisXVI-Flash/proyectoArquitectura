<?php
require_once __DIR__ . "/../models/Trabajador.php";

class controladorGestionarUsuario
{

    private $trabajador, $cliente;

    public function __construct()
    {
        $this->trabajador = new Trabajador();
        $this->cliente = new Trabajador();
    }

    public function verificar_usuario($data)
    {
        $result = $this->trabajador->verificar_usuario($data);
        $result = json_decode($result);
        if (!$result->estado) {
            $_SESSION["estado"] = $result->estado;
            $_SESSION["mensaje"] = $result->mensaje;
            require_once "./view/vista_principal.html";
            require_once "./view/Formulario_registro_trabajador.html";
        } else {
            $_SESSION["usuario"] = $result->usuario;
            require_once "./view/vista_principal.html";
            require_once "./view/Formulario_nueva_contrasenia.html";
        }
    }

    public function call_insertar($data)
    {
        $result = $this->trabajador->registrarTrabajador($data);

        $result = json_decode($result);
        $_SESSION["estado"] = $result->estado;
        $_SESSION["mensaje"] = $result->mensaje;
        require_once "./view/vista_principal.html";
        require_once "./view/Formulario_registro_trabajador.html";
    }

    public function call_actualizar($data)
    {
        $result = $this->trabajador->actualizar_trabajador($data);
        $result = json_decode($result);
        $_SESSION["estado"] = $result->estado;
        $_SESSION["mensaje"] = $result->mensaje;
        if ($result->estado) {
            unset($_SESSION["dni"]);
            require_once "./view/vista_principal.html";
            require_once "./view/Formulario_registro_trabajador.html";
        } else {
            require_once "./view/vista_principal.html";
            require_once "./view/Formulario_nueva_contrasenia.html";
        }
    }

}
?>