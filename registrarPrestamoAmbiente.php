<?php session_start();
if(!isset($_SESSION['numero_documento'])){
    header("location: ./index.php");
    exit();
}

// Aquí va el código de la clase



require_once "./classAmbientes.php";
$verAmbiente = new Ambientes();
$actualizarEstadoAmbiente = new Ambientes();




require_once "./classUsuario.php";
$mostrarUsuario = new Usuario();
$usuarioFiltrado = new Usuario();


require_once "./classPrestamo.php";
$verificarPrestamosActivos = new Prestamo();
$nuevoPrestamo = new Prestamo();
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
                <li><a class="dropdown-item" href="./ver_usuario.php">Editar usuarios</a></li>
                <li><a class="dropdown-item" href="cerrar_sesion.php">Cerrar sesión</a></li>
            </ul>
        </div>
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

                                    <select class="campos-registro select" name="lineaFormacion" id="" class="select-registro">
                                        <?php
                                        $lineas_formacion = $verAmbiente->mostrarLineaFormacion();;
                                        foreach ($lineas_formacion as $linea_formacion) {

                                        ?>
                                            <option value="<?php echo $linea_formacion['id_linea']; ?>"> <?php echo $linea_formacion['nombre_linea']; ?></option>

                                        <?php

                                        }

                                        ?>

                                    </select>

                                    <input class="campos-registro" type="text" name="cantSillas" placeholder="Cantidad sillas">

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






    <div class="flex">
        <div class="herencia">
            <div class="buscador">
                <h3 class="titulo_herencia">Prestamo de ambientes</h3>
                <div class="buscador-int">
                    <!-- <input class="input-b btns-b" type="searc" placeholder="Buscar"> -->
                    <form action="./RegistrarPrestamoAmbiente.php" method="post">
                        <input class="input-b btns-b" placeholder="Buscar" type="text" id="documento" name="documento" required>
                        <input type="submit" value="Consultar" name="consultar" class="btn-consultar">
                    </form>




                    <button class="btn-b btns-b" data-bs-toggle="modal" data-bs-target="#nuevo_ambiente">Añadir ambiente</button>

                    <a href="./verPrestamosActivos.php" class="btn-activos">Historial</a>
                    <a href="./ver_ambiente.php" class="btn-activos">Ambiente</a>
                    <a href="./registrarPrestamoElementos.php" class="btn-activos">Prestamo elementos</a>



                </div>
                <div class="bd-prestamo-ambientes">
                </div>
            </div>
            <div class="contenido">



                <?php


                if (!isset($_REQUEST['consultar'])) { ?>


                    <?php
                    $resultado = $verAmbiente->mostrarAmbienteEstado();

                    if ($resultado->num_rows == 0) {
                        echo "<center><h2>No hay ambientes disponibles</h2></center>";
                    } else {
                    ?>
                    <h4 class="text-center mt-2" >Ambientes disponibles</h4>
                    <div class="text-center">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">Numero</th>
                                    <th scope="col"  class="text-center">Piso</th>
                                    <th scope="col"  class="text-center">Linea formacion</th>
                                    <th scope="col"  class="text-center">Estado</th>
                                    <th scope="col"  class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>


                                <?php
                                while ($filas = $resultado->fetch_assoc()) {

                                    if ($filas['id_estado_ambiente'] == 1) { ?>

                                        <tr>
                                            <td class="text-center"><?php echo $filas['id_numero_ambiente']; ?></td>
                                            <td class="text-center"><?php echo $filas['piso']; ?></td>
                                            <td class="text-center"><?php echo $filas['nombre_linea']; ?></td>
                                            <td class="text-center"><?php echo $filas['estado_ambiente'] ?></td>
                                            <td class="text-center"> <a class="btn btn-info bg-success" href="verInformacionAmbiente.php?idAmbiente=<?php echo $filas['id_numero_ambiente']; ?>" style="color:white">informacion</a>
                                            </td class="text-center">
                                        </tr>

                                <?php
                                    }
                                }
                                ?>

                            </tbody>
                        </table>

                        </div>



                    <?php
                    }
                } else {
                    $documento_usuario = $_REQUEST['documento'];
                    echo $documento_usuario;

                    $usuarios_filtrados = $usuarioFiltrado->filtrarUsuarioIdNombreRol($documento_usuario, 0);




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
                                            <a class="btn btn-info bg-success" href="RegistrarPrestamoAmbiente.php?documento=<?php echo $usuarios_filtrado['numero_documento']; ?>&consultar=<?php echo $usuarios_filtrado['numero_documento']; ?>" style="color:white">seleccionar usuario</a>

                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>


                        <?php
                    } else {
                      
                        foreach ($usuarios_filtrados as $usuarios_filtrado) {
                            $cedula = $usuarios_filtrado['numero_documento'];
                        }

                        $obtenerUsuarioId = $mostrarUsuario->obtenerUsuarioId($cedula);


                        $resultadoPrestamoActivo = $verificarPrestamosActivos->prestamoActivoAmbienteNumeroDocumento($cedula);

                        // var_dump($resultadoPrestamoActivo);
                        if ($resultadoPrestamoActivo->num_rows > 0) {

                            echo "<center><h4>Usuario con prestamos activos </h4></center>";
                            while ($datos = $resultadoPrestamoActivo->fetch_assoc()) { ?>

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text-center">Id prestamo</th>
                                            <th scope="col" class="text-center">Ambiente</th>
                                            <th scope="col" class="text-center">Doc. responsable</th>
                                            <th scope="col" class="text-center">Nom. responsable</th>
                                            <th scope="col" class="text-center">Fecha prestamo</th>
                                            <th scope="col" class="text-center">Hora prestamo</th>
                                            <th scope="col" class="text-center">observaciones</th>
                                            <th scope="col" class="text-center">Estado</th>
                                            <th scope="col" class="text-center">Acciones</th>


                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>

                                            <td class="text-center"><?php echo $datos['id_prestamo']    ?></td>

                                            <td class="text-center"><?php echo $datos['id_numero_ambiente']    ?></td>

                                            <td class="text-center"><?php echo $datos['numero_documento']    ?></td>
                                            <td class="text-center"><?php echo $datos['nombre'] . " " . $datos['apellido']   ?></td>
                                            <td class="text-center"><?php echo $datos['fecha_prestamo']    ?></td>
                                            <td class="text-center"><?php echo $datos['hora_prestamo']    ?></td>



                                            <td class="text-center"><?php if ($datos['observaciones'] != NULL) { ?>
                                                <spa data-bs-toggle="tooltip" data-placement="top" title="<?php echo $datos['observaciones'] ?>">
                                                        <i class="fas fa-file"></i>
                                                 </span>
                                                <?php
                                                } else { ?>
                                                <i class="fas fa-exclamation-triangle"></i>

                                                    <?php   }
                                                    ?>
                                                    
                                            </td>
                                            <td class="text-center"><?php echo $datos['estado_prestamo'] ?></td>


                                            <td class="text-center">
                                                <a class="btn btn-info bg-success" href="verPrestamosActivos.php?idprestamoDocumento=<?php echo $datos['id_prestamo']; ?>&idEleccion=2" style="color:white">Detalle</a>
                                                


                                                <a class="btn btn-info bg-success" href="cerrarPrestamoAmbiente.php?idprestamo=<?php echo $datos['id_prestamo']; ?>&idAmbiente=<?php echo $datos['id_numero_ambiente']; ?>" style="color:white">Entregar</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                            <?php
                            }
                        } else {
                            $fila = $obtenerUsuarioId->fetch_assoc();
                            ?>
                            <form action="./RegistrarPrestamoAmbiente.php" method="post">


                                <center>
                                    <h3>Informacion usuario</h3>
                                </center>
                              


                                <!-- este input es type hidden para poder tener la cedula del usuario sin mostrarlo -->
                                <input type="hidden" name="numeroCedula" value=<?php echo $fila['numero_documento'] ?> class="input-number" readonly>


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
                                                </td>
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>


                                <?php

                                $verAmbiente = new Ambientes();
                                $resultados = $verAmbiente->mostrarAmbienteEstado();


                                if ($resultados->num_rows == 0) {
                                    echo "<center><h2>No hay ambientes disponibles</h2></center>";
                                } else {
                                ?>
                                    <input class="btn-registro btn-registro-dispositivo" type="submit" value="prestar" name=prestar>

                                    <center>
                                        <h3>Ambientes</h3>
                                    </center>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">numero</th>
                                                <th scope="col">piso</th>
                                                <th scope="col">Linea</th>
                                                <th scope="col">estado</th>
                                                <th scope="col">Check</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php


                                            while ($filas = $resultados->fetch_assoc()) {


                                                if ($filas['id_estado_ambiente'] == 1) { ?>
                                                    <tr>
                                                        <td><?php echo $filas['id_numero_ambiente']; ?></td>
                                                        <td><?php echo $filas['piso']; ?></td>
                                                        <td><?php echo $filas['nombre_linea']; ?></td>
                                                        <td><?php echo $filas['estado_ambiente'] ?></td>



                                                        <td> <input type="radio" value="<?php echo $filas['id_numero_ambiente']; ?>" name='inputselect[]' class="chkseleccion"></td>
                                                    </tr>
                                            <?php
                                                }
                                            }
                                            ?>

                                        </tbody>
                                    </table>




                                    <center><label for="">observaciones</label><br>
                                        <textarea rows="10" cols="40" name="observaciones" placeholder=""></textarea>
                                    </center>


                            </form>
                        <?php

                                }
                        ?>
            <?php
                        }
                    }
                }

            ?>




            <?php



            if (isset($_POST['prestar'])) {

                $ambiente = $_POST['inputselect'];
                $numeroCedula = $_POST['numeroCedula'];

                if (empty($_POST['observaciones'])) {
                    $observaciones = NULL;
                } else {
                    $observaciones = $_POST['observaciones'];
                }


                echo date_default_timezone_get();
                date_default_timezone_set("America/Bogota");
                echo date_default_timezone_get();



                $nuevoPrestamo->id_prestamo = NULL;
                $nuevoPrestamo->fecha_prestamo = date('Y-m-d');
                $nuevoPrestamo->hora_prestamo = date('h:i:s');
                $nuevoPrestamo->fecha_entrega = NULL;
                $nuevoPrestamo->hora_entrega =  NULL;
                $nuevoPrestamo->observaciones = $observaciones;
                $nuevoPrestamo->id_numero_ambiente = $ambiente[0];
                $nuevoPrestamo->numero_documento = $numeroCedula;
                $nuevoPrestamo->estado_prestamo = "activo";
                $id_prestamo = $nuevoPrestamo->registrarPrestamo();



                $actualizarEstadoAmbiente->id_ambiente = $ambiente[0];
                $actualizarEstadoAmbiente->estado = 2;
                $resultado_prestamo = $actualizarEstadoAmbiente->actualizarEstadoAmbiente();


                if ($resultado_prestamo) {
                    header("Location: RegistrarPrestamoAmbiente.php?id_prestamo=$id_prestamo");
                }

                // $hora = date('h:i:s');
                // $fecha = date('d-m-Y');
                // $fecha2 = date('d-m-Y  h:i:s');

                // echo $ambiente[0] . "-------------";
                // echo $numeroCedula . "-------------";
                // echo $hora . "----------------";
                // echo $fecha . "--------------";
                // echo $fecha2;



                // header("location: verPrestamosActivos.php");

                //  echo "<script>alert('datos registrados exitosamente');</script>";
            }

            ?>


            <?php


            if (isset($_REQUEST['id_prestamo'])) {
                $serialprestamo = $_REQUEST['id_prestamo']; ?>

                <script>
                    setTimeout(function() {
                        var mensaje = "datos registrados exitosamente, id_prestamo: <?php echo $serialprestamo ?>";
                        alert(mensaje);
                    }, 500);
                </script>

            <?php
                // header("Location: RegistrarPrestamoAmbiente.php"); 
            } ?>



            </div>
        </div>
    </div>
    <!-- <div class="barra_inferior">
    </div> -->



</body>

<!-- <button class="btn-1 btn-0">Prestamo de dispositivos</button>
    <button class="btn-1" type="submit" >Prestamo de ambientes</button>
    <button class="btn-1">Registro de administrador</button> -->


</html>