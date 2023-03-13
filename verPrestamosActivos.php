<?php
require_once "./classPrestamo.php";

$estadoPrestamo = new Prestamo();
$mostrar_prestamos = $estadoPrestamo->obtenerPrestamosActivosInactivos("activo");






?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./Css/prestamo_ambientes.css">
    <script src="https://kit.fontawesome.com/503089e863.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./Css/global.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@200&display=swap" rel="stylesheet">
    <title>Gestión de ambientes</title>
</head>

<body>

    <div class="parte-superior">
        <img class="logo" src="./images/logo sena.png" alt="">
        <h1 class="titulo">Gestión de Ambientes</h1>
        <div class="dropdown">
            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img class="perfil" src="./images/Boton Administrador.png" alt="">
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#" class="btn-b btns-b" data-bs-toggle="modal" data-bs-target="#editar_perfil">Editar perfil</a></li>
                <li><a class="dropdown-item" href="./editar_usuario.php">Editar usuarios</a></li>
                <li><a class="dropdown-item" href="cerrar_sesion.php">Cerrar sesión</a></li>
            </ul>
        </div>


        <!-- MODAL EDITAR USUARIO -->

        <div class="modal fade" id="editar_perfil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar perfil</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="registro-div registro_usuario-input">
                            <form class="registro registro_usuario" id="registro">
                                <div class="registro-input registro-usuario-input">
                                    <div class="rgts-input rgts-usuario-input">
                                        <input class="campos-registro" type="text" placeholder="Nombres">
                                        <input class="campos-registro" type="text" placeholder="Apellidos">
                                        <select class="campos-registro select" name="" id="" class="select-registro">
                                            <option value="" disabled selected>Tipo de documento</option>
                                            <option value="">Cedula</option>
                                            <option value="">Tarjeta de identidad</option>
                                            <option value="">Cedula de extranjeria</option>
                                            <input class="campos-registro" type="number" placeholder="Numero de documento" class="input-number">
                                            <input class="campos-registro" type="number" placeholder="Telefono" class="input-number">
                                            <input class="campos-registro" type="email" placeholder="Correo">
                                            <input class="campos-registro" type="password" placeholder="Contraseña">
                                            <button class="btn-registro btn-registro-usuario">Guardar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>


    <div class="flex">
        <div class="botones-principales">
            <a href="./registrarPrestamoAmbiente.php" class="btn-1">Prestamo de ambientes</a>
            <a href="./prestamo_dispositivos.php" class="btn-1 btn-0">Prestamo de dispositivos</a>
        </div>
        <div class="herencia">
            <div class="buscador">
                <h3 class="titulo_herencia">Prestamo de ambientes</h3>
                <div class="buscador-int">
                    <!-- <input class="input-b btns-b" type="searc" placeholder="Buscar"> -->
                    <form action="./verPrestamosActivos.php" method="post">
                        <input class="input-b btns-b" placeholder="Buscar" type="number" id="idprestamo" name="idprestamo" required>
                        <input type="submit" value="Consultar" name="consultar">
                    </form>



                    <select class="selec-b btns-b" name="" id="">
                        <option value="">Filtro</option>
                    </select>
                    <button class="btn-b btns-b">Añadir ambiente</button>
                </div>
                <div class="bd-prestamo-ambientes">
                </div>
            </div>
            <div class="contenido-ml">
                <?php


                if (isset($_REQUEST['idprestamo']) || isset($_REQUEST['consultar'])) {

                    $id_prestamo = $_REQUEST['idprestamo'];
                    $mostrar_prestamo_id = $estadoPrestamo->obtenerPrestamosId($id_prestamo);

                    var_dump($mostrar_prestamo_id);


                    if ($mostrar_prestamo_id->num_rows < 1) {
                        echo "<h3>Usuario o prestamo desconocido</h3>";
                    }

                    echo $id_prestamo;
                    while ($fila = $mostrar_prestamo_id->fetch_assoc()) {
                ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Id prestamo</th>
                                    <th scope="col">Fecha prestamo</th>
                                    <th scope="col">Hora prestamo</th>
                                    <th scope="col">Ambiente</th>
                                    <th scope="col">Fecha entrega</th>
                                    <th scope="col">Hora entrega</th>
                                    <th scope="col">Responsable</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">observaciones</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Acciones</th>


                                </tr>
                            </thead>
                            <tbody>

                                <tr>

                                    <td><?php echo $fila['id_prestamo']    ?></td>
                                    <td><?php echo $fila['fecha_prestamo']    ?></td>
                                    <td><?php echo $fila['hora_prestamo']    ?></td>
                                    <td><?php echo $fila['id_numero_ambiente']    ?></td>
                                    <td><?php echo $fila['fecha_entrega']    ?></td>
                                    <td><?php echo $fila['fecha_entrega']    ?></td>
                                    <td><?php echo $fila['numero_documento']    ?></td>
                                    <td><?php echo $fila['nombre'] . " " . $fila['apellido']    ?></td>
                                    <td><?php echo $fila['observaciones']    ?></td>
                                    <td><?php echo $fila['estado_prestamo'] ?></td>

                                    <?php
                                    if ($fila['estado_prestamo'] == "activo") { ?>

                                        <td>
                                            <a class="btn btn-info bg-success" href="añadirObservacion.php?idprestamo=<?php echo $fila['id_prestamo']; ?>" style="color:white">observacion</a>
                                            <a class="btn btn-info bg-success" href="cerrarPrestamoAmbiente.php?idprestamo=<?php echo $fila['id_prestamo']; ?>&idAmbiente=<?php echo $fila['id_numero_ambiente']; ?>" style="color:white">Entregar</a>
                                        </td>
                                    <?php
                                    } else {
                                    ?>
                                        <td>
                                            <a class="btn btn-info bg-success" href="añadirObservacion.php?idprestamo=<?php echo $fila['id_prestamo']; ?>" style="color:white">observacion</a>
                                        </td>



                                    <?php
                                    } ?>









                                </tr>







                            </tbody>
                        </table>




                <?php
                    }
                }




                ?>


                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id prestamo</th>
                            <th scope="col">Fecha prestamo</th>
                            <th scope="col">Hora prestamo</th>
                            <th scope="col">Ambiente</th>
                            <th scope="col">Fecha entrega</th>
                            <th scope="col">Hora entrega</th>
                            <th scope="col">Responsable</th>
                            <th scope="col">observaciones</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Acciones</th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        while ($rows = $mostrar_prestamos->fetch_assoc()) {
                        ?>

                            <tr>

                                <td><?php echo $rows['id_prestamo']    ?></td>
                                <td><?php echo $rows['fecha_prestamo']    ?></td>
                                <td><?php echo $rows['hora_prestamo']    ?></td>
                                <td><?php echo $rows['id_numero_ambiente']    ?></td>
                                <td><?php echo $rows['fecha_entrega']    ?></td>
                                <td><?php echo $rows['fecha_entrega']    ?></td>
                                <td><?php echo $rows['numero_documento']    ?></td>
                                <td><?php echo $rows['observaciones']    ?></td>
                                <td><?php echo $rows['estado_prestamo'] ?></td>

                                <?php
                                if ($rows['estado_prestamo'] == "activo") {
                                    # code...

                                ?>



                                    <td>
                                        <a class="btn btn-info bg-success" href="añadirObservacion.php?idprestamo=<?php echo $rows['id_prestamo']; ?>" style="color:white">observacion</a>
                                        <a class="btn btn-info bg-success" href="cerrarPrestamoAmbiente.php?idprestamo=<?php echo $rows['id_prestamo']; ?>&idAmbiente=<?php echo $rows['id_numero_ambiente']; ?>" style="color:white">Entregar</a>
                                    </td>

                            </tr>

                        <?php
                                } else { ?>

                            <td>
                                <a class="btn btn-info bg-success" href="añadirObservacion.php?idprestamo=<?php echo $rows['id_prestamo']; ?>" style="color:white">observacion</a>
                            </td>

                            </tr>

                    <?php

                                }
                            }

                    ?>

                    </tbody>
                </table>

            </div>
</body>

</html>