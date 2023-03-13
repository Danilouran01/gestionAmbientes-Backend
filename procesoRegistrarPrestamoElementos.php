
<?php



if (isset($_POST['prestar'])) {

    // $ambiente = $_POST['inputselect'];
    $numeroCedula = $_POST['numeroCedula'];
    $equipos_seleccionados=$_POST['equipos'];

    echo $numeroCedula ."-";
    echo $equipos_seleccionados[0];

    // if (empty($_POST['observaciones'])) {
    //     $observaciones = NULL;
    // } else {
    //     $observaciones = $_POST['observaciones'];
    // }

    foreach ($equipos_seleccionados as $equipo_id) {
        echo "- " . $equipo_id . "<br>";
      }

    // $nuevoPrestamo->id_prestamo = NULL;
    // $nuevoPrestamo->fecha_prestamo = date('Y-m-d');
    // $nuevoPrestamo->hora_prestamo = date('h:i:s');
    // $nuevoPrestamo->fecha_entrega = NULL;
    // $nuevoPrestamo->hora_entrega =  NULL;
    // $nuevoPrestamo->observaciones = $observaciones;
    // $nuevoPrestamo->id_numero_ambiente = NULL;
    // $nuevoPrestamo->numero_documento = $numeroCedula;
    // $nuevoPrestamo->estado_prestamo = "activo";
    // $nuevoPrestamo->registrarPrestamo();







    // date_default_timezone_set("UTC");


    // $hora = date('h:i:s');
    // $fecha = date('d-m-Y');
    // $fecha2 = date('d-m-Y  h:i:s');

    // echo $ambiente[0] . "-------------";
    // echo $numeroCedula . "-------------";
    // echo $hora . "----------------";
    // echo $fecha . "--------------";
    // echo $fecha2;



    // header("location: verPrestamosActivos.php");

    //  echo "<script>alert('datos registrados exitosamente');</script>";
}


?>