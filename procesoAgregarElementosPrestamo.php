
<?php 

require_once "./classDetallePrestamo.php";
require_once "./classElemento.php";

$detallePrestamo = new DetallePrestamo();
$actualizarElemento = new Elemento();

if (isset($_POST['agregar'])) {

    // $ambiente = $_POST['inputselect'];
    $id_prestamo = $_POST['idPrestamo'];
    $equipos_seleccionados = $_POST['equipos'];

    // registramos el prestamo
    echo date_default_timezone_get();
    date_default_timezone_set("America/Bogota");
    echo date_default_timezone_get();

    $elementos_agregados = 0;
    foreach ($equipos_seleccionados as $equipo) {


        $cargador = isset($_POST['cargador_' . $equipo]) ? $_POST['cargador_' . $equipo] : 'no';
        $mouse = isset($_POST['mouse_' . $equipo]) ? $_POST['mouse_' . $equipo] : 'no';

        $detallePrestamo->id_detalle_prestamo = NULL;
        $detallePrestamo->cantidad = NULL;
        $detallePrestamo->id_prestamo = $id_prestamo;
        $detallePrestamo->serial = $equipo;
        $detallePrestamo->cargador = $cargador;
        $detallePrestamo->mouse = $mouse;
        $detalle_prestamo = $detallePrestamo->registrarDetallePrestamo();

        $actualizarElemento->serial = $equipo;
        $actualizarElemento->estado = 2;
        $actualizar_elemento = $actualizarElemento->ActualizarEstadoElemento();


        if ($detalle_prestamo && $actualizar_elemento) {
            $elementos_agregados++;
        }
    }


    if ($elementos_agregados == count($equipos_seleccionados)) {

        header("location: VerDetallePrestamoElementos.php?idPrestamo=$id_prestamo&agregar='true'");
    }
}


?>
