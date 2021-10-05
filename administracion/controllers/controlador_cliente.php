<?php
require_once "./models/Cliente.php";
require_once "./models/conexion.php";
require_once "./view/vista_principal.html";

//botones

if (isset($_POST["btngestionarr"]) or isset($_POST["verificar_usuario"]) or isset($_POST["guardar_usuario"]) or isset($_POST["contrasenia_usuario"])) {
    require_once "./view/FormularioCliente.html";

} elseif (isset($_POST['Agregar'])) {
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $correo = $_POST['correo'];
    $dni = $_POST['dni'];
    $celular = $_POST['celular'];
    if ($nombres != null && $apellidos != null && $correo != null && $dni != null && $celular != null) {

        $cliente = new Cliente;
        $cliente->registrar_cliente($nombres, $apellidos, $correo, $dni, $celular);

        $_SESSION["estado"] = true;
        $_SESSION["mensaje"] = "Cliente agregado correctamente";
        // header("Location: index.php?vista=cliente");
    }
} else if (isset($_POST['Editar'])) {
    $id = $_GET['id'];

    $obj_cl = new Cliente;
    $cliente = $obj_cl->obtener_un_cliente($id);

    require_once "./view/editar_cliente.html";

} else if (isset($_POST['Eliminar'])) {
    $id = $_GET['id'];

    $cl = new Cliente;
    $cl->eliminarcliente($id);
    header("Location: index.php?vista=cliente");
} else if (isset($_POST['test'])) {
    $a = $_POST['idcliente'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $correo = $_POST['correo'];
    $dni = $_POST['dni'];
    $celular = $_POST['celular'];

    $obj_act = new Cliente;
    $obj_act->editarcliente($a, $nombres, $apellidos, $correo, $dni, $celular);
?>

    <script type="text/javascript">
        alert("Cliente modificado exitosamente");
    </script>

<?php

    $array = listar_cliente();
    require_once "./view/Formulario_listar_cliente.html";

} else {
    $array = listar_cliente();
    require_once "./view/Formulario_listar_cliente.html";
}

?>
