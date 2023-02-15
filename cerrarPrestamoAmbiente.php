<?php
include_once"./classPrestamo.php";
$id_prestamo=$_REQUEST['idprestamo'];

$cerrarPrestamo= new Prestamo();
$cerrarPrestamo->fecha_entrega=date('Y-m-d');
$cerrarPrestamo->hora_entrega=date('h:i:s');
$cerrarPrestamo->id_prestamo=$id_prestamo;
$cerrarPrestamo->cerrarPrestamo();




?>