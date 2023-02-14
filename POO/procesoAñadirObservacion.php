<?php
require_once"./classPrestamo.php";
if (isset($_GET['btnObservacion'])) {
    $observacion=$_GET['observaciones'];
    $id_prestamo=$_GET['idPrestamo'];
    $añadirObservaciones=new Prestamo();
     $añadirObservaciones->observaciones=$observacion;
     $añadirObservaciones->id_prestamo=$id_prestamo;
    $añadirObservaciones->añadirObservacion();

    echo"<script>alert('observacion añadida con exito');</script>";
    
    header("location: verPrestamosActivos.php ");
}


// $añadirObservacion->añadirObservacion();



?>