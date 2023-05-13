<?php 
require_once "./classObservacionesAmbientes.php";
if (!empty($_REQUEST['idObservacion'])) {

    $id_observacion=$_REQUEST['idObservacion'];
$id_ambiente=$_REQUEST['idAmbiente'];

    $eliminarObservacion= new ObservacionesAmbientes();
    $eliminarObservacion->id_observacion=$id_observacion;
    $observacion_eliminada=$eliminarObservacion->eliminarObservacion();

    if ($observacion_eliminada) {
       header("Location:verObservacionesAmbiente.php?idAmbiente=$id_ambiente&observacionEliminada=$observacion_eliminada");
    }else{

    }

    # code...
}



?>