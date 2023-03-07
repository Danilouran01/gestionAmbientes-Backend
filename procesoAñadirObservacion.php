<?php
require_once"./classPrestamo.php";
session_start();
if(!isset($_SESSION['numero_documento'])){
    header("location: index.php");
};
if (isset($_GET['btnObservacion'])) {
    $observacion=$_GET['observaciones'];
    $id_prestamo=$_GET['idPrestamo'];
    $añadirObservaciones=new Prestamo();
     $añadirObservaciones->observaciones=$observacion;
     $añadirObservaciones->id_prestamo=$id_prestamo;
    $añadirObservaciones->añadirObservacion();

    echo"<script>alert('observacion añadida con exito');</script>";
    
    // header("location: verPrestamosActivos.php ");
    header("Location: verPrestamosActivos.php?idprestamo=$id_prestamo");

}


// $añadirObservacion->añadirObservacion();



?>