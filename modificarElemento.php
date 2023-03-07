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

    <link rel="shortcut icon" href="images/logo1.png" type="image/x-icon">
    <!--Todo lo de boostrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style.css">
    <style>
        .fakeimg {
            height: 200px;
            background: #aaa;
        }
    </style>
    <title>Modificar Usuario </title>
    <!--Fin boostrap -->
</head>

<body>


    <?php



    $serial = $_REQUEST['serial'];

    require_once "./classElemento.php";
    $verElementoId = new Elemento();
    $resultado = $verElementoId->obtenerElementoPorSerial($serial);
    $row = $resultado->fetch_assoc();

    ?>

    <div class="registro-div registro_dispositivo-div">
        <form class="registro registro-dispositivo" id="registro" action="./modificarElemento.php" method="post">
            <h3>Modificar dispositivo</h3>
            <div class="registro-input registro_dispositivo-input">
                <div class="rgts-input rgts_dispositivo-input">
                    <select name="tipoDispositivo" id="" class="select-registro">
                        <option value="<?php echo $row['tipo_dispositivo'] ?>"><?php echo $row['tipo_dispositivo'] ?></option>
                        <option value="computador de mesa">computador de mesa</option>
                        <option value="todo en uno">todo en uno</option>

                    </select>
                    <input type="number" placeholder="Serial" name="serial" value="<?php echo $row['serial'] ?>" readonly>
                    <input type="text" placeholder="Marca" name="marca" value="<?php echo $row['marca'] ?>">
                    <input type="text" placeholder="Modelo" name="modelo" value="<?php echo $row['modelo'] ?>">
                    <input type="text" placeholder="Placa" name="placa" value="<?php echo $row['placa'] ?>">
                    <select name="estado" id="" class="select-registro">
                        <option value="disponible">disponible</option>
                        <option value="ocupado">ocupado</option>
                        <option value="mantenimiento">en mantenimiento</option>
                    </select>

                    <input class="btn-registro btn-registro-dispositivo" type="submit" value="registrar elemento" name="enviarElemnto">
                    <!-- <button class="btn-registro btn-registro-dispositivo">Guardar</button> -->
                   
                </div>
            </div>
        </form>
    </div>
    <?php
    require_once "./classElemento.php";

    if (isset($_POST['enviarElemnto']) && !empty($_POST['enviarElemnto'])) {
        $serial = $_POST['serial'];
        $tipoDispositivo = $_POST['tipoDispositivo'];
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $placa = $_POST['placa'];
        $estado = $_POST['estado'];

        $modificarElemento = new Elemento();
        $modificarElemento ->serial=$serial;
        $modificarElemento ->tipoDispositivo=$tipoDispositivo;
        $modificarElemento ->marca=$marca;
        $modificarElemento ->modelo=$modelo;
        $modificarElemento ->placa=$placa;
        $modificarElemento ->estado=$estado;
        $modificarElemento ->modificarElemento();
    }
    ?>

</body>

</html>