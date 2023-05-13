<?php 
require_once "./classDetallePrestamo.php";
require_once "./classElemento.php";





if (empty($_REQUEST['idPrestamo']) || empty($_REQUEST['Serial'])) {
   header("Location: VerDetallePrestamoElementos.php.php");
   exit;
}

$id_prestamo = $_REQUEST['idPrestamo'];
$serial = $_REQUEST['Serial'];

$desasociarElemento = new DetallePrestamo();
$desasociarElemento->id_prestamo = $id_prestamo;
$desasociarElemento->serial = $serial;
$desasociar_elemento=$desasociarElemento->desasociarElementoPrestamo();

$actualizarElemento = new Elemento();
$actualizarElemento->serial = $serial;
$actualizarElemento->estado = 1;
$actualizar_elemento = $actualizarElemento->ActualizarEstadoElemento();

if ($desasociar_elemento && $actualizar_elemento) {
    header("Location: VerDetallePrestamoElementos.php?idPrestamo=$id_prestamo");
    exit;
}
?>
