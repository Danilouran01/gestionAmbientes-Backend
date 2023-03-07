<?php 
session_start();
if(!isset($_SESSION['numero_documento'])){
    header("location: index.php");
};
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <title>Document</title>
</head>

<body>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">numero</th>
                <th scope="col">piso</th>
                <th scope="col">estado</th>




            </tr>
        </thead>
        <tbody>

            <?php
            require_once "./classAmbientes.php";
            $verAmbiente = new Ambientes();
            $resultado = $verAmbiente->mostrarAmbiente();
            ?>
            <?php
            while ($filas = $resultado->fetch_assoc()) {
               
            ?>
                <tr>
                    <td><?php echo $filas['id_numero_ambiente']; ?></td>
                    <td><?php echo $filas['piso']; ?></td>
                    <td><?php echo $filas['estado_ambiente'] ?></td>

                    <?php

                    if ($filas['id_estado_ambiente'] == 1) { ?>
                        <td><a class="btn btn-info bg-success" href="modificarAmbientes.php?idAmbiente=<?php echo $filas['id_numero_ambiente']; ?>" style="color:white">Editar</a></td>
                        <td><a class="btn btn-info bg-success" href="eliminarAmbiente.php?idAmbiente=<?php echo $filas['id_numero_ambiente']; ?>" style="color:white">Eliminar</a></td>
                        <td><a class="btn btn-info bg-success" href="registrarPrestamoAmbiente.php?idambiente=<?php echo $filas['id_numero_ambiente']; ?>" style="color:white">Prestar</a></td>
                    <?php
                    } else { ?>

                        <td><a class="btn btn-info bg-success" href="modificarAmbientes.php?idAmbiente=<?php echo $filas['id_numero_ambiente']; ?>" style="color:white">Editar</a></td>
                        <td><a class="btn btn-info bg-success" href="eliminarAmbiente.php?idAmbiente=<?php echo $filas['id_numero_ambiente']; ?>" style="color:white">Eliminar</a></td>



                    <?php
                    }




                    ?>
                </tr>
            <?php
            }

            ?>
        </tbody>
    </table>

</body>

</html>