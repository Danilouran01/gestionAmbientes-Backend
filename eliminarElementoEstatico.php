<?php  
require_once "./classElementosEstaticos.php";

if (isset($_REQUEST['serial'])) {
    $serial=$_REQUEST['serial'];
    $serial=$_REQUEST['serial'];

    $eliminarElementoEstatico =new ElementosEstaticos();
    $eliminarElementoEstatico->id_elemento_estatico=$serial;
    $elemento_eliminado=$eliminarElementoEstatico->eliminarElementoEstatico();


    if ($elemento_eliminado) {
    header("location:verElementosEstaticos.php?eliminar=$elemento_eliminado");
    }


}




?>