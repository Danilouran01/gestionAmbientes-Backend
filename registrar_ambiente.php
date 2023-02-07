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

    <div class="registro-div registro-ambiente-div">
        <form class="registro registro-ambiente" id="registro" action="registrar_ambiente.php" method="post">
            <h3>Registro de ambiente</h3>
            <div class="registro-input registro-ambiente-input">
                <div class="rgts-input rgts-ambiente-input">

                    <input type="text" name="numeroAmbiente" placeholder="numero abiemte">
                    <input type="text" name="numeroPiso" placeholder="numero piso">
                    <select name="estadoAmbiente" class="select-registro">
                        <option value="disponible">Disponible</option>
                        <option value="ocupado">Ocupado</option>
                    </select>
                    <!-- <input type="text" name="elementoAmbiente" placeholder="elemento ambiente"> -->
                    <input class="btn-registro btn-registro-ambiente" type="submit" value="registrar" name="registrar">




                </div>
            </div>
        </form>
    </div>




    <!-- <form >
    <input type="text" placeholder="Tipo de dispositivo">
                    <input type="text" placeholder="Marca">
                    <input type="text" placeholder="Modelo">
                    <input type="text" placeholder="Placa">
                    <input type="text" placeholder="Estado">

    </form> -->
    <?php
    if (isset($_POST['registrar'])) {
        $numeroAmbiente = $_POST['numeroAmbiente'];
        $numeroPiso = $_POST['numeroPiso'];
        $estadoAmbiente = $_POST['estadoAmbiente'];
        // $elementoAmbiente = $_POST['elementoAmbiente'];

        // echo "numero" . $numeroAmbiente;
        include("./conexion.php");

        $query = "INSERT INTO `ambientes`(`id_numero_ambiente`, `piso`, `estado`) VALUES ('$numeroAmbiente','$numeroPiso','$estadoAmbiente')";
        $resultadoQuery = mysqli_query($mysqli, $query);

        if ($resultadoQuery) {
            echo "Datos insertados correctamente";
        } else {
            echo "No se pudieron insertar los datos, error: " . mysqli_error($mysqli);
        }
    }


    ?>

</body>

</html>