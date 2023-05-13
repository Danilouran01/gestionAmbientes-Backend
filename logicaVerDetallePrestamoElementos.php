<?php  
require_once "./logicaVerDetallePrestamoElementos.php";

require_once "./classDetallePrestamo.php";
require_once "./classPrestamo.php";


$id_prestamo = $_REQUEST['idPrestamo'];

if (empty($_REQUEST['idPrestamo'])) {
    header("Location:verPrestamosElementos.php");
    exit;
}


$validarPrestamo = new Prestamo();
$prestamo_validado = $validarPrestamo->validarExistenciaPrestamo($id_prestamo);

if (!$prestamo_validado) {
    header("Location:verPrestamosElementos.php");
    exit;
}

if (!empty($_REQUEST['Serial'])) {
    $serial = $_REQUEST['Serial'];
    $modificarPrestamoElemento = new DetallePrestamo();
    $elementos_filtrados = $modificarPrestamoElemento->obtenerDetallePorIdPrestamoSerial($serial, $id_prestamo);

    $tipo_elemento = $elementos_filtrados[0]['tipo_dispositivo'];
    //evaluamos valor del cargador para listar correctamente el valor en el select
    $cargadorop1 = ($elementos_filtrados[0]['cargador'] == "si") ? "si" : "no";
    $cargadorop2 = ($elementos_filtrados[0]['cargador'] != "si") ? "si" : "no";
    //evaluamos valor del mouse para listar correctamente el valor en el select
    $mouseop1 = ($elementos_filtrados[0]['mouse'] == "si") ? "si" : "no";
    $mouseop2 = ($elementos_filtrados[0]['mouse'] == "si") ? "no" : "si";
}



//Ver cantidad elementos
$VerCantidadElementos = new Prestamo();
$VerCantidadElementos->id_prestamo = $id_prestamo;
$cantidad_elementos = $VerCantidadElementos->ObtenercantidadElementosPrestamo();

// ver detalle prestamo
$verPrestamo = new DetallePrestamo();
$verPrestamo->id_prestamo = $id_prestamo;
$elementos = $verPrestamo->ObtenerDetallePrestamoElementos();

// obtenemos datos del usuario
$usuario_cedula = $elementos[0]['numero_documento'];
$usuario_nombre = $elementos[0]['nombre'];
$usuario_apellido = $elementos[0]['apellido'];
$fecha_prestamo = $elementos[0]['fecha_prestamo'];
$fecha_entrega = $elementos[0]['fecha_entrega'];
$hora_prestamo = $elementos[0]['hora_prestamo'];
$hora_entrega = $elementos[0]['hora_entrega'];
$observacion = $elementos[0]['observaciones'];
$estado_prestano = $elementos[0]['estado_prestamo'];
// var_dump($elementos);


?>