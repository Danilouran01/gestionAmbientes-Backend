<?php
    require_once "./classElemento.php";

    $serial = $_REQUEST['serial'];
    $direccion="ver_elemento.php";
    
    $eliminarElemento = new Elemento();
    $eliminarElemento->eliminarElemento($serial,$direccion);
?>