<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Document</title>
</head>

<body>
    <div class="registro-div registro-ambiente-div">
        <form class="registro registro-ambiente" id="registro" action="./registrarAmbientes.php" method="post">
            <h3>Registro de ambiente</h3>
            <div class="registro-input registro-ambiente-input">
                <div class="rgts-input rgts-ambiente-input">

                    <input type="text" name="numeroAmbiente" placeholder="numero ambiente" required>
                    <input type="text" name="numeroPiso" placeholder="numero piso" required>
                    
                    <select name="estadoAmbiente" class="select-registro">
                    <?php
                        include "../conexion.php";
                        $sql = "SELECT * FROM `estado_ambiente`";
                        $resultadoSql = mysqli_query($mysqli, $sql);
                        if ($resultadoSql) {


                            while ($row = $resultadoSql->fetch_assoc()) {

                        ?>
                                <option value="<?php echo $row['id_estado_ambiente']; ?>"> <?php echo $row['estado_ambiente']; ?></option>

                        <?php

                            }
                        } else {
                            echo "erro: " . mysqli_error($mysqli);
                        }
                        ?>
                    </select>
                    <!-- <input type="text" name="elementoAmbiente" placeholder="elemento ambiente"> -->
                    <input class="btn-registro btn-registro-ambiente" type="submit" value="registrar" name="registrar">
                </div>
            </div>
        </form>
    </div>

    <?php
    require "./classAmbientes.php";

    if (isset($_POST['registrar'])) {
        echo  $_POST['numeroAmbiente'];
        $ambiente = new Ambientes();
        $ambiente->id_ambiente = $_POST['numeroAmbiente'];
        $ambiente->piso = $_POST['numeroPiso'];
        $ambiente->estado = $_POST['estadoAmbiente'];

        $ambiente->registrarAmbiente();




    }


    ?>

</body>

</html>