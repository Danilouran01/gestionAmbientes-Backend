<?php


require_once "./conexionPoo.php";
session_start();
if(!isset($_SESSION['numero_documento'])){
    header("location: index.php");
};

$conexion = new Conexion();
$conexion->conectar();

//    consulta tipo elemenento select

$tipo_dispositivo = "SELECT * FROM `tipo_dispositivo`";
$consulta_tipo_dispositivo = mysqli_query($conexion->con, $tipo_dispositivo);

//    consulta estado elemenento select
$estado_dispositivo = "SELECT `id_estado_elemento`, `estado_elemento` FROM `estado_elementos`";
$consulta_estado_dispositivo = mysqli_query($conexion->con, $estado_dispositivo);


?>


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

    <div class="registro-div registro_dispositivo-div">
        <form class="registro registro-dispositivo" id="registro" action="./registrarElemento.php" method="post">
            <h3>Registrar dispositivo</h3>
            <div class="registro-input registro_dispositivo-input">
                <div class="rgts-input rgts_dispositivo-input">
                    <select name="tipoDispositivo" id="" class="select-registro" required>
                        <?php
                        while ($row = $consulta_tipo_dispositivo->fetch_assoc()) { ?>


                            <option value="<?php echo $row['id_tipo_dispositivo']   ?>"><?php echo $row['tipo_dispositivo']   ?></option>

                        <?php

                        }
                        ?>

                    </select>
                    <input type="number" placeholder="Serial" name="serial" required>
                    <input type="text" placeholder="Marca" name="marca" required>
                    <input type="text" placeholder="Modelo" name="modelo" required>
                    <input type="text" placeholder="Placa" name="placa" required>
                    <select name="estado" id="" class="select-registro" required>
                        <?php
                        if ($consulta_estado_dispositivo) {
                            while ($row = $consulta_estado_dispositivo->fetch_assoc()) { ?>


                                <option value="<?php echo $row['id_estado_elemento']   ?>"><?php echo $row['estado_elemento']   ?></option>


                        <?php

                            }
                        } else {
                            echo "error: "  . mysqli_error($conexion->con);
                        }

                        ?>

                    </select>

                    <input class="btn-registro btn-registro-dispositivo" type="submit" value="registrar elemento" name="enviarElemento">
                    <!-- <button class="btn-registro btn-registro-dispositivo">Guardar</button> -->
                    <button class="btn-registro btn-eliminar-dispositivo">Eliminar</button>
                </div>
            </div>
        </form>
    </div>




    <?php
    require_once "./classElemento.php";

    if (isset($_POST['enviarElemento']) && !empty($_POST['enviarElemento'])) {
        $serial = $_POST['serial'];
        $tipoDispositivo = $_POST['tipoDispositivo'];
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $placa = $_POST['placa'];
        $estado = $_POST['estado'];

        // inicio nuevo objecto
        $elemento = new Elemento();
        $elemento->serial = $serial;
        $elemento->tipoDispositivo = $tipoDispositivo;
        $elemento->marca = $marca;
        $elemento->modelo = $modelo;
        $elemento->placa = $placa;
        $elemento->estado = $estado;
        $elemento->registrarElemento();
        //fin


    }


    ?>