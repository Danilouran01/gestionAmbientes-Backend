<?php
require_once "./classDetallePrestamo.php";

    if (isset($_POST['editar_detalle'])) {
$serial=$_POST['serial'];
$mouse=$_POST['mouse'];
$cargador=$_POST['cargador'];
$id_prestamo=$_POST['id_prestamo'];


echo $serial;
echo $cargador;
echo $mouse;    
echo $id_prestamo;    

$modificarDetallePrestamo= new DetallePrestamo();
$modificarDetallePrestamo->cargador=$cargador;
$modificarDetallePrestamo->mouse=$mouse;
$modificarDetallePrestamo->id_prestamo=$id_prestamo;
$modificarDetallePrestamo->serial=$serial;
$prestamo_modifictado=$modificarDetallePrestamo->modificarDetallePrestamoElemento();

if ($prestamo_modifictado) {
    header("Location: verDetallePrestamoElementos.php?idPrestamo=$id_prestamo&Serial=$serial");
}else{
    echo "error al insertar datos";
}

}


?>

