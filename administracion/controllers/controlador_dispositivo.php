
<?php
require_once "./view/vista_principal.html";
require_once "./models/Dispositivo.php";

if (isset($_POST["Guardar"])) {
    $id = $_POST["id"];
    $pack = $_POST["pac"];
    $valor = 0;
    if (isset($_POST["estado"]) && $_POST["estado"] == "on") {
        $valor = 1;
    }
    if ($id != null && $pack != null) {

        $dispositivo = new Dispositivo();
        $dispositivo->agregar($id, $pack, $valor);
        // header("Location: index.php?vista=dispositivo");
    }

} elseif (isset($_GET["operacion"]) and isset($_GET["id"])) {

    if ($_GET["operacion"] == "editar") {
        $id = $_GET['id'];

        $obj_dis = new Dispositivo;
        $dispositivo = $obj_dis->obtener_un_dispositivo($id);

        include_once "./view/actualizar_dispositivo.html";

    } else if ($_GET["operacion"] == "eliminar") {
        $id = $_GET['id'];
        $d = new Dispositivo;
        $d->eliminardispositivo($id);
        header("Location: index.php?vista=dispositivo");
    }
} else if (isset($_POST['actualizar']) and isset($_GET['id'])) {

    $idproducto = $_GET['id'];
    $id = $_POST['idproducto'];
    $pac = $_POST['pac'];
    $estado = $_POST['estado'];

    $obj_act = new Dispositivo;
    $obj_act->editardispositivo($idproducto, $id, $pac, $estado);
    require_once "./view/listar_dispositivo.html";

} elseif (isset($_POST["btnAgregarDispositivo"])) {
    require_once "./view/dispositivo_agregar.html";
} else {
    require_once "./view/listar_dispositivo.html";
}

?>
