<?php  
require_once "./classPrestamo.php";
if (isset($_GET['btnObservacion'])) {
    $pagina_origen = $_REQUEST['paginaOrigen'];
    $observacion = $_GET['observacion'];
    $id_prestamo = $_GET['idPrestamo'];


    
    $añadirObservaciones = new Prestamo();
    $añadirObservaciones->observaciones = $observacion;
    $añadirObservaciones->id_prestamo = $id_prestamo;
    $observacion_modificada = $añadirObservaciones->modificarObservacion();



    if ($observacion_modificada) {

        if ($pagina_origen == 'verPrestamosElementos.php') {
            header("Location:verPrestamosElementos.php?idPrestamoObservacion=$id_prestamo&modificado=$observacion_modificada");
        }

        if ($pagina_origen == 'verPrestamosActivos.php') {
            header("Location:verPrestamosActivos.php?idPrestamoObservacion=$id_prestamo&modificado=$observacion_modificada");
        }

        if ($pagina_origen == 'VerDetallePrestamoElementos.php') {
            header("Location:VerDetallePrestamoElementos.php?idPrestamo=$id_prestamo&modificado=$observacion_modificada&idPrestamoObservacion=$id_prestamo");
        }

    }
}
