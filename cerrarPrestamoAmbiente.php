<?php 
include_once "./classPrestamo.php";
include_once "./classAmbientes.php";
if (isset($_REQUEST['idprestamo'])  && isset($_REQUEST['idAmbiente'])) {
    $id_prestamo = $_REQUEST['idprestamo'];
    $id_ambientes = $_REQUEST['idAmbiente'];

    echo $id_ambientes . "<br>";
    echo $id_prestamo;

    $cerrarPrestamo = new Prestamo();
    $actualizarEstadoAmbientes = new Ambientes();

    $actualizarEstadoAmbientes->id_ambiente = $id_ambientes;
    $actualizarEstadoAmbientes->estado = 1;
    $actualizarEstadoAmbientes->actualizarEstadoAmbiente();

    $cerrarPrestamo->fecha_entrega = date('Y-m-d');
    $cerrarPrestamo->hora_entrega = date('h:i:s');
    $cerrarPrestamo->id_prestamo = $id_prestamo;
    $cerrarPrestamo->estado_prestamo = "inactivo";
    $cerrarPrestamo->cerrarPrestamo();

    $result_actualiazar = $actualizarEstadoAmbientes->actualizarEstadoAmbiente();
    $result_cerrar = $cerrarPrestamo->cerrarPrestamo();


    if ($result_actualiazar && $result_cerrar) {

        // header("Location: verPrestamosActivos.php");
        header("Location: verPrestamosActivos.php?idprestamoDocumento=$id_prestamo&idEleccion=2");

        // echo "correcto";
        // echo "----" .  $result_actuliazar . ".....";
        // echo $result_cerrar;
    }
} else {
    echo "ocurrio un error";
}
