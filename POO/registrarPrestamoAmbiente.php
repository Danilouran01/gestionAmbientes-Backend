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
    <form action="./registrarPrestamoAmbiente.php" method="post">
        <input type="text" name="documento" placeholder="Consulte cedula">
        <input type="submit" value="Consultar" name="consultar">
    </form>
    <?php
    if (isset($_POST['consultar'])) {

        $documentoInstructor = $_POST['documento'];

        echo $documentoInstructor;

        require_once "./classInstructor.php";
        $modificarInstructor = new Instructor();
        $obtenerUsuarioId = $modificarInstructor->obtenerUsuarioId($documentoInstructor);
        $fila = $obtenerUsuarioId->fetch_assoc();


    ?>


        <div class="registro-div registro_usuario-input">
            <form class="registro registro_usuario" id="registro" method="post" action="./proceso_modificar_instructor.php">
                <h3>Datos Instructor</h3>
                <div class="registro-input registro-usuario-input">
                    <div class="rgts-input rgts-usuario-input">
                        <select name="tipoDocumento" id="" class="select-registro">
                            <option value=<?php echo $fila['idDocumento']; ?>><?php echo $fila['tipo'] ?> </option>


                        </select>

                        <input type="number" name="numeroCedula" value=<?php echo $fila['numero_documento'] ?> class="input-number" readonly>
                        <input type="text" name="nombre" value="<?php echo $fila['nombre'] ?>" readonly>
                        <input type="text" name="apellido" value="<?php echo $fila['apellido'] ?>" class="input-number" readonly>
                        <input type="text" name="telefono" value="<?php echo $fila['telefono'] ?>" readonly>
                        <input type="email" name="correo" value="<?php echo $fila['correo']; ?>" readonly>
                        <select name="rol" id="" class="select-registro">
                            <option value="id_rol"><?php echo $fila['nombre_rol']; ?></option>
                        </select>
                        <!-- <input class="btn-registro btn-registro-usuario" type="submit" value="Registrar usuario" name="enviar"> -->
                    </div>
                </div>
            </form>
        </div>

    <?php


    }
    ?>
</body>

</html>