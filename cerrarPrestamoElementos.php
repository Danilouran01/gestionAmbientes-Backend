<?php 
include_once "./classPrestamo.php";
include_once "./classElemento.php";
include_once "./classDetallePrestamo.php";

if (isset($_REQUEST['idprestamo'])) {
    $id_prestamo = $_REQUEST['idprestamo'];
    



    $cerrarPrestamo = new Prestamo();
    $actualizarElemento = new Elemento();
    $obtenerElementos = new DetallePrestamo();

    $elementos = $obtenerElementos->obtenerElementosPorPrestamo($id_prestamo);

    // var_dump($elementos);
    // el contador suma la cantidad de elementos que se actulizan para comprarlos posteriormente con el nun_rows de $elementos
    $contador = 0;
    foreach ($elementos as $elemento) {
        $actualizarElemento->serial = $elemento['serial'];
        $actualizarElemento->estado = 1;
        $result_actualizar = $actualizarElemento->ActualizarEstadoElemento();
        if ($result_actualizar) {
            $contador += 1;
        }
    }

    $cerrarPrestamo->fecha_entrega = date('Y-m-d');
    $cerrarPrestamo->hora_entrega = date('h:i:s');
    $cerrarPrestamo->id_prestamo = $id_prestamo;
    $cerrarPrestamo->estado_prestamo = "inactivo";
    $result_cerrar = $cerrarPrestamo->cerrarPrestamo();

    echo $contador;


    if ($contador == $elementos->num_rows && $result_cerrar) {

        
        header("Location: verPrestamosElementos.php?idprestamoDocumento=$id_prestamo&idEleccion=2");


    }
} else {
    echo "ocurrio un error";
}
