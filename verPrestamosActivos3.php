<?php
require_once "./classPrestamo.php";
require_once "./codigoTabla.php";

session_start();
if(!isset($_SESSION['numero_documento'])){
    header("location: index.php");
};

$estadoPrestamo = new Prestamo();
$mostrar_prestamos = $estadoPrestamo->obtenerPrestamosActivosInactivos("activo");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style.css">
    <title>Document</title>
</head>

<body>

    <?php


    if (isset($_REQUEST['idprestamo'])) {

        $id_prestamo=$_REQUEST['idprestamo'];
        $mostrar_prestamo_id=$estadoPrestamo->obtenerPrestamosId($id_prestamo);

        echo $id_prestamo;
?>
 <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id prestamo</th>
                    <th scope="col">Fecha prestamo</th>
                    <th scope="col">Hora prestamo</th>
                    <th scope="col">Ambiente</th>
                    <th scope="col">Fecha entrega</th>
                    <th scope="col">Hora entrega</th>
                    <th scope="col">Responsable</th>
                    <th scope="col">observaciones</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Acciones</th>


                </tr>
            </thead>
            <tbody>
                <?php

                $fila = $mostrar_prestamo_id->fetch_assoc();
                ?>

                    <tr>

                        <td><?php echo $fila['id_prestamo']    ?></td>
                        <td><?php echo $fila['fecha_prestamo']    ?></td>
                        <td><?php echo $fila['hora_prestamo']    ?></td>
                        <td><?php echo $fila['id_numero_ambiente']    ?></td>
                        <td><?php echo $fila['fecha_entrega']    ?></td>
                        <td><?php echo $fila['fecha_entrega']    ?></td>
                        <td><?php echo $fila['numero_documento']    ?></td>
                        <td><?php echo $fila['observaciones']    ?></td>
                        <td><?php echo $fila['estado_prestamo'] ?></td>



                        <td>
                            <a class="btn btn-info bg-success" href="añadirObservacion.php?idprestamo=<?php echo $fila['id_prestamo']; ?>" style="color:white">observacion</a>
                            <a class="btn btn-info bg-success" href="cerrarPrestamoAmbiente.php?idprestamo=<?php echo $fila['id_prestamo']; ?>&idAmbiente=<?php echo $fila['id_numero_ambiente']; ?>" style="color:white">Entregar</a>
                        </td>







                    </tr>







            </tbody>
        </table>




         <?php
 Ver_Prestamos();


    } else {


   Ver_Prestamos();

    }

    ?>
</body>

</html>