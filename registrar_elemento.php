<?php include("./conexion.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>

    <div class="registro-div registro_dispositivo-div">
        <form class="registro registro-dispositivo" id="registro" action="registrar_elemento.php" method="post">
            <h3>Registrar dispositivo</h3>
            <div class="registro-input registro_dispositivo-input">
                <div class="rgts-input rgts_dispositivo-input">
                    <select name="tipoDispositivo" id="" class="select-registro">
                        <option value="portatil">portatil</option>
                        <option value="computador de mesa">computador de mesa</option>
                        <option value="todo en uno">todo en uno</option>

                    </select>
                    <input type="text" placeholder="Serial" name="serial">
                    <input type="text" placeholder="Marca" name="marca">
                    <input type="text" placeholder="Modelo" name="modelo">
                    <input type="text" placeholder="Placa" name="placa">
                    <select name="estado" id="" class="select-registro">
                        <option value="disponible">disponible</option>
                        <option value="ocupado">ocupado</option>
                        <option value="mantenimiento">en mantenimiento</option>
                    </select>

                    <input class="btn-registro btn-registro-dispositivo" type="submit" value="resgistrar elemento" name="enviarElemnto">
                    <!-- <button class="btn-registro btn-registro-dispositivo">Guardar</button> -->
                    <button class="btn-registro btn-eliminar-dispositivo">Eliminar</button>
                </div>
            </div>
        </form>
    </div>




    <?php
    if (isset($_POST['enviarElemnto']) && !empty($_POST['enviarElemnto'])) {
        $serial = $_POST['serial'];
        $tipoDispositivo = $_POST['tipoDispositivo'];
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $placa = $_POST['placa'];
        $estado = $_POST['estado'];

       


        $sqlElementos = "INSERT INTO `elementos`(`serial`, `tipo_dispositivo`, `marca`, `modelo`, `placa`, `estado`) VALUES ('$serial','$tipoDispositivo ','$marca','$modelo','$placa','$estado')";
        $resultadoElementos = mysqli_query($mysqli, $sqlElementos);

        if ($resultadoElementos) {
            echo "Datos insertados correctamente";
        } else {
            echo "No se pudieron insertar los datos, error: " . mysqli_error($mysqli);
        }
    }



    ?>
</body>

</html>