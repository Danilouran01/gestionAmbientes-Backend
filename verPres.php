<?php  session_start();
if(!isset($_SESSION['numero_documento'])){
    header('Location: index.php');
    exit();
}

require_once "./classPrestamo.php";

$estadoPrestamo = new Prestamo();
$mostrar_prestamos = $estadoPrestamo->obtenerPrestamosgeneralesElementos();


$verificarPrestamosActivos = new Prestamo();
$nuevoPrestamo = new Prestamo();

require_once "./classAmbientes.php";
$verAmbiente = new Ambientes();
$actualizarEstadoAmbiente = new Ambientes();


require_once "./classUsuario.php";
$mostrarUsuario = new Usuario();

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

        <!-- MODAL NUEVO DISPOSITVO -->


        <div class="modal fade" id="nuevo_ambiente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir nuevo ambiente</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="registro-div registro_usuario-input">
                            <form class="registro registro_usuario" id="registro" action="./registrarAmbientes.php" method="post">
                                <div class="registro-input registro-usuario-input">
                                    <div class="rgts-input rgts-usuario-input">

                                        <input class="campos-registro" type="text" name="numeroAmbiente" placeholder="numero ambiente" required>
                                        <input class="campos-registro" type="text" name="numeroPiso" placeholder="numero piso" required>
                                        <select class="campos-registro select" name="estadoAmbiente" id="" class="select-registro">
                                            <?php
                                            $estado_ambientes = $verAmbiente->estadoAmbiente();
                                            foreach ($estado_ambientes as $estado_ambiente) {

                                            ?>
                                                <option value="<?php echo $estado_ambiente['id_estado_ambiente']; ?>"> <?php echo $estado_ambiente['estado_ambiente']; ?></option>

                                            <?php

                                            }

                                            ?>

                                        </select>

                                        <input class="btn-registro btn-registro-ambiente" type="submit" value="registrar" name="registrar">

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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


    <!-- <div class="flex"> -->
    <div class="herencia">
        <div class="buscador">
            <h3 class="titulo_herencia">Ambientes activos</h3>
            <div class="buscador-int">
                <!-- <input class="input-b btns-b" type="searc" placeholder="Buscar"> -->
                <form action="./verPres.php" method="post">
                    <input class="input-b btns-b" placeholder="Buscar" type="text" id="idprestamo" name="idprestamo" required>
                    <input type="submit" value="Consultar" name="consultar" class="btn-consultar">

                    <input class="input-b btns-b" type="date" name="fechaInicio">
                    <input class="input-b btns-b" type="date" name="fechaFin">
                    <select class="selec-b btns-b" name="idEleccion" id="">
                        <option value="1">Usuario</option>
                        <option value="2">Prestamo</option>
                    </select>
                </form>




                <button class="btn-b btns-b" data-bs-toggle="modal" data-bs-target="#nuevo_ambiente">Añadir ambiente</button>
                <a href="./registrarPrestamoAmbiente.php" class="btn-activos">Prestar ambiente</a>
                <a href="./registrarPrestamoElementos.php" class="btn-activos">Prestar Elementos</a>


            </div>
            <div class="bd-prestamo-ambientes">
            </div>
        </div>
        <div class="contenido">
            <?php


            if (isset($_REQUEST['idprestamo']) || isset($_REQUEST['consultar'])) {

                $id_prestamo_documento = $_REQUEST['idprestamo'];
              


                if (isset($_REQUEST['idEleccion'])) {
                    $id_eleccion = $_REQUEST['idEleccion'];
                    # code...
                }

                if ($id_eleccion == '2') {
                    $id_prestamo_documento = $_REQUEST['idprestamo'];
                    // echo "id : hola 2";
                    $mostrar_prestamo_id = $estadoPrestamo->obtenerPrestamosUsuarioIdPrestamo($id_prestamo_documento);
                    if ($mostrar_prestamo_id->num_rows < 1) {

                        echo "<h4>no encontrado</h4>";
                        # code...
                    }
                    // var_dump($mostrar_prestamo_id);

                } else {



                    $usuarios_filtrados = $mostrarUsuario->filtrarUsuarioIdNombreRol($id_prestamo_documento, NULL);




                    if ($usuarios_filtrados->num_rows < 1) {
                        echo "<script>setTimeout(function(){ alert('Usuario no encontrado'); }, 100);</script>";
                    } elseif ($usuarios_filtrados->num_rows > 1) { ?>


                        <table class="table table-striped table-dark">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">Tipo documento</th>
                                    <th scope="col" class="text-center">N° documento</th>
                                    <th scope="col" class="text-center">Nombre</th>
                                    <th scope="col" class="text-center">Apellido</th>
                                    <th scope="col" class="text-center">Correo</th>
                                    <th scope="col" class="text-center">Telefono</th>
                                    <th scope="col" class="text-center">Rol</th>
                                    <th scope="col" class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php


                                foreach ($usuarios_filtrados as $usuarios_filtrado) {

                                ?>

                                    <tr>
                                        <td class="text-center"><?php echo $usuarios_filtrado['tipo'] ?></td>
                                        <td class="text-center"><?php echo $usuarios_filtrado['numero_documento'] ?></td>
                                        <td class="text-center"><?php echo $usuarios_filtrado['nombre'] ?></td>
                                        <td class="text-center"><?php echo $usuarios_filtrado['apellido'] ?></td>
                                        <td class="text-center"><?php echo $usuarios_filtrado['correo']  ?></td>
                                        <td class="text-center"><?php echo $usuarios_filtrado['telefono']  ?></td>
                                        <td class="text-center"><?php echo $usuarios_filtrado['nombre_rol']  ?></td>
                                        <td class="text-center">
                                            <a class="btn btn-info bg-success" href="verPrestamosElementos.php?idprestamo=<?php echo $usuarios_filtrado['numero_documento']; ?>&idEleccion=1" style="color:white">seleccionar usuario</a>

                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    <?php
                    } else {

                        if (!empty($_REQUEST['fechaInicio']) || !empty($_REQUEST['fechaFin'])) {


                            $usuario = $usuarios_filtrados->fetch_assoc();
                            $mostrar_prestamo_id = $estadoPrestamo->obtenerPrestamosUsuarioFecha($usuario['numero_documento'], $_REQUEST['fechaInicio'], $_REQUEST['fechaFin']);
                            // var_dump($mostrar_prestamo_id);
                            if ($mostrar_prestamo_id->num_rows < 1) {

                                echo "<script>setTimeout(function(){ alert('Usuario sin prestamos en esa fecha'); }, 500);</script>";
                                # code...
                            }
                            # code...
                        } else {
                            $usuario = $usuarios_filtrados->fetch_assoc();
                            $mostrar_prestamo_id = $estadoPrestamo->obtenerPrestamosUsuarioIdPrestamo($usuario['numero_documento']);
                            // var_dump($mostrar_prestamo_id);
                            if ($mostrar_prestamo_id->num_rows < 1) {

                                echo "<script>setTimeout(function(){ alert('Usuario sin prestamos fin'); }, 500);</script>";
                                # code...
                            }
                        } // fin if para fecha o solo usuario 
                    } //fin else compracion id o usario
                } //fin if formulario 

                if (isset($mostrar_prestamo_id) && $mostrar_prestamo_id->num_rows > 0) {
                    # code...

                    ?>


                    <a class="btn btn-info bg-success" href="descargarExcelPrestamos.php?cedula=<?php echo $_REQUEST['idprestamo'] ?>" style="color:white">descargar informe</a>

                    <h4 class="text-center">Prestamos usuario</h4>



                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">Id prestamo</th>
                                <th scope="col" class="text-center">Doc. Responsable</th>
                                <th scope="col" class="text-center">Nom. Responsable</th>
                                <th scope="col" class="text-center">Cantidad elementos</th>
                                <th scope="col" class="text-center">Fecha prestamo</th>
                                <th scope="col" class="text-center">Hora prestamo</th>
                                <th scope="col" class="text-center">Fecha entrega</th>
                                <th scope="col" class="text-center">Hora entrega</th>
                                <!-- <th scope="col" class="text-center">observaciones</th> -->
                                <th scope="col" class="text-center">Estado</th>
                                <th scope="col" class="text-center">Acciones</th>



                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // echo $id_prestamo;
                            foreach ($mostrar_prestamo_id as $filas) {
                            ?>

                                <tr>

                                    <td class="text-center"><?php echo $filas['id_prestamo']    ?></td>
                                    <td class="text-center"><?php echo $filas['numero_documento']    ?></td>
                                    <td class="text-center"><?php echo $filas['nombre'] . " " . $filas['apellido']    ?></td>
                                    <td class="text-center"><?php echo $filas['cant']  ?></td>
                                    <td class="text-center"><?php echo $filas['fecha_prestamo']    ?></td>
                                    <td class="text-center"><?php echo $filas['hora_prestamo']    ?></td>

                                    <td class="text-center"><?php echo $filas['fecha_entrega']    ?></td>
                                    <td class="text-center"><?php echo $filas['hora_entrega']    ?></td>

                                    <!-- <td class="text-center"><?php echo $filas['observaciones']    ?></td> -->
                                    <td class="text-center"><?php echo $filas['estado_prestamo'] ?></td>

                                    <?php
                                    if ($filas['estado_prestamo'] == "activo") { ?>

                                        <td class="text-center">
                                            <a class="btn btn-info bg-success" href="añadirObservacion.php?idprestamo=<?php echo $filas['id_prestamo']; ?>" style="color:white">observacion</a>
                                            <a class="btn btn-info bg-success" href="cerrarPrestamoElementos.php?idprestamo=<?php echo $filas['id_prestamo']; ?>&idAmbiente=<?php echo $fila['id_numero_ambiente']; ?>" style="color:white">Entregar</a>
                                        </td>
                                    <?php
                                    } else {
                                    ?>
                                        <td class="text-center">
                                            <a class="btn btn-info bg-success" href="añadirObservacion.php?idprestamo=<?php echo $filas['id_prestamo']; ?>" style="color:white">observacion</a>
                                        </td>



                                    <?php
                                    } ?>
                                </tr>


                    <?php
                            }
                        }
                    }

                    ?>
                        </tbody>
                    </table>





                    <h4 class="text-center">Prestamos Generales</h4>


                    <table class="table table table-striped">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">Id prestamo</th>
                                <th scope="col" class="text-center">Doc. Responsable</th>
                                <th scope="col" class="text-center">Nom. Responsable</th>
                                <th scope="col" class="text-center">Cantidad elementos</th>
                                <th scope="col" class="text-center">Fecha prestamo</th>
                                <th scope="col" class="text-center">Hora prestamo</th>
                                <th scope="col" class="text-center">Fecha entrega</th>
                                <th scope="col" class="text-center">Hora entrega</th>
                                <th scope="col" class="text-center">observaciones</th>
                                <th scope="col" class="text-center">Estado</th>
                                <th scope="col" class="text-center">Acciones</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            foreach ($mostrar_prestamos as $fila) {
                            ?>

                                <tr>

                                    <td class="text-center"><?php echo $fila['id_prestamo']    ?></td>
                                    <td class="text-center"><?php echo $fila['numero_documento']    ?></td>
                                    <td class="text-center"><?php echo $fila['nombre'] . " " . $fila['apellido']    ?></td>
                                    <td class="text-center"><?php echo $fila['cant']  ?></td>
                                    <td class="text-center"><?php echo $fila['fecha_prestamo']    ?></td>
                                    <td class="text-center"><?php echo $fila['hora_prestamo']    ?></td>

                                    <td class="text-center"><?php echo $fila['fecha_entrega']    ?></td>
                                    <td class="text-center"><?php echo $fila['hora_entrega']    ?></td>

                                    <td class="text-center"><?php echo $fila['observaciones']    ?></td>
                                    <td class="text-center"><?php echo $fila['estado_prestamo'] ?></td>

                                    <?php
                                    // if ($fila['estado_prestamo'] == "activo") {
                                    //     # code...

                                    ?>



                                    <td class="text-center">
                                        <a class="btn btn-info bg-success" href="añadirObservacion.php?idprestamo=<?php echo $fila['id_prestamo']; ?>" style="color:white">observacion</a>
                                        <!-- <a class="btn btn-info bg-success" href="cerrarPrestamoAmbiente.php?idprestamo=<?php echo $fila['id_prestamo']; ?>&idAmbiente=<?php echo $rows['id_numero_ambiente']; ?>" style="color:white">Entregar</a> -->
                                    </td>

                                </tr>

                        

                            <?php
                                
                            }
                            ?>

                        </tbody>
                    </table>


                    <!-- </div> -->
        </div>
        <!-- <div class="barra_inferior">
        </div> -->

</html>