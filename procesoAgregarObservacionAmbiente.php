<?php 
require_once "./classObservacionesAmbientes.php";
date_default_timezone_set("America/Bogota");

if (isset($_REQUEST['registrar'])) {

    $id_ambiente=$_REQUEST['numeroAmbiente'];
    $observacion=$_REQUEST['observacion'];
    $fecha_observacion=date('Y-m-d');
    $hora_observacion=date('h:i:s');

    $agregarObservacion = new ObservacionesAmbientes();
    $agregarObservacion->observacion=$observacion;
    $agregarObservacion->fecha_observacion=$fecha_observacion;
    $agregarObservacion->hora_observacion=$hora_observacion;
    $agregarObservacion->id_numero_ambiente=$id_ambiente;
    $observacion_agregada=$agregarObservacion->agregarObservacion();
    
    if ($observacion_agregada) {
        header("Location:verObservacionesAmbiente.php?idAmbiente=$id_ambiente&observacion=$observacion_agregada");

    }
   
}
