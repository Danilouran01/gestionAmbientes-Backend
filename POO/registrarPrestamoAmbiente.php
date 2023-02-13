<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style.css">

    <title>Document</title>
</head>

<body>


    <form action="./registrarPrestamoAmbiente.php" method="post">
        <input type="number" id="documento" name="documento" placeholder="Consulte cedula" required>
        <input type="submit" value="Consultar" name="consultar">
    </form>



    <?php
    if (!isset($_POST['consultar'])) { ?>
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


                    if ($filas['id_estado_ambiente'] == 1) { ?>
                        <tr>
                            <td><?php echo $filas['id_numero_ambiente']; ?></td>
                            <td><?php echo $filas['piso']; ?></td>
                            <td><?php echo $filas['estado_ambiente'] ?></td>
                        <?php
                    }

                        ?>


                        </tr>
                    <?php
                }
                    ?>
            </tbody>
        </table>





    <?php
    } else {

        $documentoInstructor = $_POST['documento'];
        echo $documentoInstructor;

        require_once "./classInstructor.php";
        $modificarInstructor = new Instructor();
        $obtenerUsuarioId = $modificarInstructor->obtenerUsuarioId($documentoInstructor);
        $fila = $obtenerUsuarioId->fetch_assoc();

    ?>


        <form action="./registrarPrestamoAmbiente.php" method="post">



            <div class="registro-div registro_usuario-input">
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


                        <!-- <input class="btn-registro btn-  registro-usuario" type="submit" value="Registrar usuario" name="enviar"> -->
                    </div>
                </div>
            </div>


            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">numero</th>
                        <th scope="col">piso</th>
                        <th scope="col">estado</th>
                    </tr>
                </thead>
                <tbody>


                    <script type="text/javascript" src="../jquery.js"></script>
                    <script type="text/javascript">
                        $(document).ready(function() {
                            $('input[type=checkbox]').live('click', function() {
                                var parent = $(this).parent().attr('id');
                                $('#' + parent + ' input[type=checkbox]').removeAttr('checked');
                                $(this).attr('checked', 'checked');
                            });
                        });
                    </script>
                    <?php
                    require_once "./classAmbientes.php";
                    $verAmbiente = new Ambientes();
                    $resultado = $verAmbiente->mostrarAmbiente();
                    ?>
                    <?php
                    while ($filas = $resultado->fetch_assoc()) {


                        if ($filas['id_estado_ambiente'] == 1) { ?>
                            <tr>

                                <td><?php echo $filas['id_numero_ambiente']; ?></td>
                                <td><?php echo $filas['piso']; ?></td>
                                <td><?php echo $filas['estado_ambiente'] ?></td>
                                <td> <input type="checkbox" value="<?php echo $filas['id_numero_ambiente']; ?>" name='inputselect[]' class="chkseleccion"></td>
                                <!-- <td><a class="btn btn-info bg-success" href="?idambiente=<?php echo $filas['id_numero_ambiente']; ?>" style="color:white">Prestar</a></td> -->

                                <input type="submit" name="" value="">

                            <?php
                        } else {
                            ?>
                                <!-- <h2>No se econtaron ambientes disponibles</h2> -->
                            <?php
                        }
                            ?>
                            </tr>
                        <?php
                    }
                        ?>
                </tbody>
            </table>


            <label for="">observaciones</label><br>
            <textarea rows="10" cols="40" name="observaciones" placeholder=""></textarea>

            <input class="btn-registro btn-registro-dispositivo" type="submit" value="prestar" name=prestar>
        </form>
    <?php
    }
    ?>



    <?php

    include_once "./classPrestamo.php";
    include_once "./classAmbientes.php";


    if (isset($_POST['prestar'])) {

        $ambiente = $_POST['inputselect'];
        $numeroCedula = $_POST['numeroCedula'];

        if (empty($_POST['observaciones'])) {
            $observaciones = NULL;
        } else {
            $observaciones = $_POST['observaciones'];
        }


        $nuevoPrestamo = new Prestamo();


        $nuevoPrestamo->id_prestamo = NULL;
        $nuevoPrestamo->fecha_prestamo = date('Y-m-d');
        $nuevoPrestamo->hora_prestamo = date('h:i:s');
        $nuevoPrestamo->fecha_entrega = NULL;
        $nuevoPrestamo->hora_entrega =  NULL;
        $nuevoPrestamo->observaciones = $observaciones;
        $nuevoPrestamo->id_numero_ambiente = $ambiente[0];
        $nuevoPrestamo->numero_documento = $numeroCedula;
        $nuevoPrestamo->estado_prestamo="activo";
        $nuevoPrestamo->registrarPrestamo();


        $actualizarEstadoAmbiente = new Ambientes();
        $actualizarEstadoAmbiente->id_ambiente = $ambiente[0];
        $actualizarEstadoAmbiente->estado = 2;
        $actualizarEstadoAmbiente->actualizarEstadoAmbiente();



        date_default_timezone_set("UTC");


        $hora = date('h:i:s');
        $fecha = date('d-m-Y');
        $fecha2 = date('d-m-Y  h:i:s');

        echo $ambiente[0] . "-------------";
        echo $numeroCedula . "-------------";
        echo $hora . "----------------";
        echo $fecha . "--------------";
        echo $fecha2;





        // header("Location: ver_ambiente.php");
    }



    ?>

</body>

</html>