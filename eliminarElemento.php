<?php 
    require_once "./classElemento.php";

    $serial = $_REQUEST['serial'];
    $direccion="ver_elemento.php";
    
    $eliminarElemento = new Elemento();
   $eliminar_elemento=$eliminarElemento->eliminarElemento($serial);
   if ($eliminar_elemento) {
    header("Location:ver_elemento.php?serialElemento=$serial" );
   }

?>