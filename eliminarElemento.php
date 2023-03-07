<?php
    require_once "./classElemento.php";

    session_start();
if(!isset($_SESSION['numero_documento'])){
    header("location: index.php");
};

    $serial = $_REQUEST['serial'];
    $direccion="ver_elemento.php";
    
    $eliminarElemento = new Elemento();
    $eliminarElemento->eliminarElemento($serial,$direccion);
?>