<?php
require_once "./classObservacionesAmbientes.php";


if (isset($_REQUEST['modificar'])) {

    $id_observacion=$_REQUEST['idObservacion'];
    $observacion=$_REQUEST['observacion'];
    $id_ambiente=$_REQUEST['idAmbiente'];


    $modificarObservacion= new ObservacionesAmbientes();


    $modificarObservacion->id_observacion=$id_observacion;
    $modificarObservacion->observacion=$observacion;
    $observacion_modificada=$modificarObservacion->modificarObservacion();


    if ($observacion_modificada) {

        header("Location: verObservacionesAmbiente.php?idAmbiente=$id_ambiente&idObservacion=$id_observacion&modificado=$observacion_modificada");
        # code...
    }





    
}



?>