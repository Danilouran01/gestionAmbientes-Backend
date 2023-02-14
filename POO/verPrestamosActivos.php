<?php
require_once "./classPrestamo.php";

$estadoPrestamo = new Prestamo();
$mostrar_prestamos = $estadoPrestamo->obtenerPrestamosActivos("activo");
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

            while ($rows = $mostrar_prestamos->fetch_assoc()) {
            ?>

                <tr>

                    <td><?php echo $rows['id_prestamo']    ?></td>
                    <td><?php echo $rows['fecha_prestamo']    ?></td>
                    <td><?php echo $rows['hora_prestamo']    ?></td>
                    <td><?php echo $rows['id_numero_ambiente']    ?></td>
                    <td><?php echo $rows['fecha_entrega']    ?></td>
                    <td><?php echo $rows['fecha_entrega']    ?></td>
                    <td><?php echo $rows['numero_documento']    ?></td>
                    <td><?php echo $rows['observaciones']    ?></td>
                    <td><?php echo $rows['estado_prestamo']?></td>

                    

                    <td>
                    <a class="btn btn-info bg-success" href="añadirObservacion.php?idprestamo=<?php echo $rows['id_prestamo']; ?>" style="color:white">observacion</a>
                        <a class="btn btn-info bg-success" href="cerrarPrestamoAmbiente.php?idprestamo=<?php echo $rows['id_prestamo']; ?>" style="color:white">Entregar</a>
                    </td>





                </tr>

            <?php
            }

            ?>





        </tbody>
    </table>

  
</body>

</html>