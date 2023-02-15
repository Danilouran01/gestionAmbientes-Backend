<?php
$documentoInstructor = $_REQUEST['documento'];

require_once "./classInstructor.php";
$modificarInstructor = new Instructor();
$obtenerUsuarioId = $modificarInstructor->obtenerUsuarioId($documentoInstructor);
$fila = $obtenerUsuarioId->fetch_assoc();
$idDocumento = $fila['idDocumento'];
$resultadoSelect = $modificarInstructor->obtenerTipoDocumento($idDocumento);

?>
<!DOCTYPE html>
<html lang="en">|

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Document</title>
</head>

<body>

    <div class="registro-div registro_usuario-input">
        <form class="registro registro_usuario" id="registro" method="post" action="./proceso_modificar_instructor.php">
            <h3>Registro de usuario</h3>
            <div class="registro-input registro-usuario-input">
                <div class="rgts-input rgts-usuario-input">
                    <select name="tipoDocumento" id="" class="select-registro">
                                <option value=<?php echo $fila['idDocumento']; ?>><?php echo $fila['tipo'] ?> </option>
                        <?php
                        if ($resultadoSelect) {
                            while ($rows = $resultadoSelect->fetch_assoc()) { ?>
                                <option value="<?php echo $rows['idDocumento']; ?>"> <?php echo $rows['tipo']; ?></option>

                        <?php
                            }
                        } else {
                            echo "erro: " . mysqli_error($mysqli);
                        }
                        ?>

                    </select>

                    <input type="number" name="numeroCedula" value=<?php echo $fila['numero_documento'] ?> class="input-number">
                    <input type="text" name="nombre" value="<?php echo $fila['nombre'] ?>">
                    <input type="text" name="apellido" value="<?php echo $fila['apellido'] ?>" class="input-number">
                    <input type="text" name="telefono" value="<?php echo $fila['telefono'] ?>">
                    <input type="email" name="correo" value="<?php echo $fila['correo']; ?>">
                    <select name="rol" id="" class="select-registro">
                        <option value="id_rol"><?php echo $fila['nombre_rol']; ?></option>
                    </select>
                    <input class="btn-registro btn-registro-usuario" type="submit" value="Registrar usuario" name="enviar">
                </div>
            </div>
        </form>
    </div>


</body>

</html>