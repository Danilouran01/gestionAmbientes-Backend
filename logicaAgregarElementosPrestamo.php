<?php  
require_once "./classElemento.php";
require_once "./classPrestamo.php";
require_once "./classDetallePrestamo.php";

$id_prestamo = $_REQUEST['idPrestamo'];

if (empty($id_prestamo)) {
    header("Location:verPrestamosElementos.php");
    exit;
}


$validarPrestamo = new Prestamo();
$prestamo_validado = $validarPrestamo->validarExistenciaPrestamo($id_prestamo);

if (!$prestamo_validado || $prestamo_validado[0]['estado_prestamo']=='inactivo') {
    header("Location:verPrestamosElementos.php");
    exit;
}


$elementosDisponibles = new Elemento();
$elementos_disponibles=$elementosDisponibles->mostrarElementosDisponibles();

$verPrestamo = new DetallePrestamo();
$verPrestamo->id_prestamo = $id_prestamo;
$elementos = $verPrestamo->ObtenerDetallePrestamoElementos();

// obtenemos datos del usuario
$usuario_cedula = $elementos[0]['numero_documento'];
$usuario_nombre = $elementos[0]['nombre'];
$usuario_apellido = $elementos[0]['apellido'];



$tipo_dispositivo=$elementosDisponibles->tipoElemenento();







?>