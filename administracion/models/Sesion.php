<?php 
session_start();
function abrir_sesion(){
    if(!isset($_SESSION['idcargo'])){
        session_start();
    }
}
function cerrar_sesion(){
   session_destroy();
}

?>