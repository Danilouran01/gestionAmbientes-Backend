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


    <div class="registro-div">
        <form class="registro registro-admin" id="registro" action="./registrarAdministradorHerencia.php" method="POST">
            <h3>Registro Administrador</h3>
            <div class="registro-input">
                <div class="rgts-input">
                    <select name="tipoDocumento" id="" class="select-registro">
                        <?php
                        require("../conexion.php");
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
                    </select>>

                    <input type="number" placeholder="Numero de Cedula" class="input-number" name="numeroDocumento">
                    <input type="text" placeholder="Nombres" name="nombre">
                    <input type="text" placeholder="Apellidos" name="apellido">
                    <input type="email" placeholder="Correo electronico" name="correo">
                    <input type="password" placeholder="Contraseña" name="Contrasena">
                    <input type="number" placeholder="Numero celular" class="input-number" name="telefono">

                    <!-- <select name="rol" id="" class="select-registro">
                        <?php
                        $sqlRol = "SELECT * FROM `rol` WHERE id_rol != 1";
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
                    </select> -->
                    <input class="btn-registro" type="submit" value="Registrarse" name="registrar">
                </div>
            </div>
        </form>
    </div>

    <?php
    require "./classAdministrador.php";

    if (isset($_POST['registrar'])) {
        $aa = $_POST['tipoDocumento'];
        $contrasena = $_POST['Contrasena'];
        $tipoDocumento = $_POST['tipoDocumento'];
        $numeroCedula = $_POST['numeroDocumento'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];
        // $setContrasena($contrasena);
        $rol = 1;
        // $numeroFicha="NULL";

        echo $aa;
        $admin = new Administradorr(
            $tipoDocumento,
            $numeroCedula,
            $nombre,
            $apellido,
            $telefono,
            $correo,
            $rol,
            0,
            $contrasena

        );
        $admin->registrarUsuario();
    }

    ?>

</body>

</html>