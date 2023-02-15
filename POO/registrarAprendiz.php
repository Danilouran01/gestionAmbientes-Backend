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

    <div class="registro-div registro_usuario-input">
        <form class="registro registro_usuario" id="registro" action="./registrarAprendiz.php" method="post">
            <h3>Registro de usuario</h3>
            <div class="registro-input registro-usuario-input">
                <div class="rgts-input rgts-usuario-input">


                    <select name="tipoDocumento" class="select-registro">
                        <?php
                        include "../conexion.php";
                        $sql = "SELECT * FROM `tipo_documento`";
                        $resultadoSql = mysqli_query($mysqli, $sql);
                        if ($resultadoSql) {


                            while ($row = $resultadoSql->fetch_assoc()) {

                        ?>
                                <option value="<?php echo $row['idDocumento']; ?>"> <?php echo $row['tipo']; ?></option>

                        <?php

                            }
                        } else {
                            echo "erro: " . mysqli_error($mysqli);
                        }
                        ?>
                    </select>
                    <input type="number" placeholder="Numero de documento" class="input-number" name="numeroCedula" required>
                    <input type="text" placeholder="Nombre" name="nombre" required>
                    <input type="text" placeholder="Apellido" name="apellido" required>
                    <input type="number" placeholder="N° ficha" name="ficha" required>
                    <input type="text" placeholder="Telefono" class="input-number" name="telefono" required>
                    <input type="email" placeholder="Correo" name="correo" required>
                    <select name="rol" id="" class="select-registro" required>
                        <?php
                        $sqlRol = "SELECT * FROM `rol` WHERE id_rol = 3";
                        $resultadoSqlRol = mysqli_query($mysqli, $sqlRol);
                        if ($resultadoSqlRol) {
  

                            while ($rowRol = $resultadoSqlRol->fetch_assoc()) {

                        ?>
                                <option value="<?php echo $rowRol['id_rol']; ?>"> <?php echo $rowRol['nombre_rol']; ?></option>

                        <?php

                            }
                        } else {
                            echo "erro: " . mysqli_error($mysqli);
                        }
                        ?>
                    </select>
                    <input class="btn-registro btn-registro-usuario" type="submit" value="Registrar usuario" name="enviar">
                </div>
            </div>
        </form>
    </div>

    <?php
    include_once "./classAprendiz.php";
    if (isset($_POST['enviar'])) {

        $tipoDocumento = $_POST['tipoDocumento'];
        $numeroCedula = $_POST['numeroCedula'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];
        $rol = $_POST['rol'];
        $ficha=$_POST['ficha'];

        

        $aprendiz = new Aprendiz();
        $aprendiz->tipoDocumento=$tipoDocumento;
        $aprendiz->numeroDocumento=$numeroCedula;
        $aprendiz->nombre=$nombre;
        $aprendiz->apellido=$apellido;
        $aprendiz->telefono=$telefono;
        $aprendiz->correo=$correo;
        $aprendiz->rol=$rol;
        $aprendiz->setFicha($ficha);
        $aprendiz->setContrasena(NULL);

        $aprendiz->registrarUsuario();
    }


    ?>