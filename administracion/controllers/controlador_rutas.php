<?php
require_once "./models/Sesion.php";
require_once "./models/conexion.php";
if (isset($_GET["cerrar"])) {
    session_destroy();
    header("Location: index.php");
}
if (isset($_SESSION["idcargo"])) {

    require_once "./view/layout/header.php";

    if (isset($_GET["vista"])) {
        if ($_GET["vista"] == "cliente" &&($_SESSION['idcargo'] == 1 || $_SESSION['idcargo'] == 2)) {
            require_once "./controllers/controlador_cliente.php";

        } elseif ($_GET["vista"] == "dispositivo") {
            require_once "./controllers/controlador_dispositivo.php";
        } elseif ($_GET["vista"] == "atendidos" &&($_SESSION['idcargo']==1 || $_SESSION['idcargo']==3)) {
            require_once "./view/vista_principal.html";
            require_once "./controllers//controlador_estado.php";
        } elseif ($_GET["vista"] == "pedidos" &&($_SESSION['idcargo']==1 || $_SESSION['idcargo']==3)) {
            require_once "./view/vista_principal.html";
            require_once "./controllers/controlador_atendidos.php";
        } elseif ($_GET["vista"] == "atendidos2" &&($_SESSION['idcargo']==1 || $_SESSION['idcargo']==3)) {
            require_once "./view/vista_principal.html";
            require_once "./controllers/controlador_noatendidos.php";
        } elseif ($_GET["vista"] == "usuarios" && ($_SESSION['idcargo']==1 || $_SESSION['idcargo']==3)) {
            require_once "./view/vista_principal.html";
            require_once "./controllers/controlador_gestionar_trabajador.php";
            
            
        } else {
            require_once "./view/vista_principal.html";
        }
    } else {
        require_once "./controllers/controlador_dashboard.php";
        require_once "./view/vista_principal.html";
        require_once "./view/dashboard.html";
    }
    require_once "./view/layout/footer.php";
} else {
    require_once "./controllers/controller_Trabajador.php";
}
?>
