<?php
require_once "./classElemento.php";
$mostrarElemento = new Elemento();
$actualizarElemento = new Elemento();



require_once "./classUsuario.php";
$mostrarUsuario = new Usuario();


require_once "./classPrestamo.php";
$verificarPrestamosActivos = new Prestamo();
$nuevoPrestamo = new Prestamo();


require_once "./classDetallePrestamo.php";
$detallePrestamo = new DetallePrestamo();
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
                    <form action="./registrarPrestamoElementos.php" method="post">
                        <input class="input-b btns-b" placeholder="Buscar" type="number" id="documento" name="documento" required>
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
            <div class="contenido">






                <?php
                if (!isset($_POST['consultar'])) {



                    $Elementos = $mostrarElemento->mostrarElementosDisponibles();


                    // var_dump($Elementos);

                    if ($Elementos->num_rows == 0) {
                        echo "<center><h2>No hay dispositivos disponibles</h2></center>";
                    } else {



                ?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">serial</th>
                                    <th scope="col">placa</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">marca</th>
                                    <th scope="col">modelo</th>


                                </tr>
                            </thead>
                            <tbody>


                                <?php

                                foreach ($Elementos as $Elemento) {

                                ?>

                                    <tr>
                                        <td><?php echo $Elemento['serial']; ?></td>
                                        <td><?php echo $Elemento['placa']; ?></td>
                                        <td><?php echo $Elemento['tipo_dispositivo'] ?></td>
                                        <td><?php echo $Elemento['marca'] ?></td>
                                        <td><?php echo $Elemento['modelo'] ?></td>
                                    </tr>

                                <?php

                                }
                                ?>

                            </tbody>
                        </table>





                        <?php
                    }
                    // fin foreach

                    //evalua si el buscador envio algun  id , en caso que si guardamos el id capturado
                } else {
                    $documento_usuario = $_POST['documento'];
                    echo $documento_usuario;

                    $obtener_usuario_id = $mostrarUsuario->obtenerUsuarioId($documento_usuario);

                    // var_dump($obtenerUsuarioId);




                    if ($obtener_usuario_id->num_rows == 0) {
                        echo "<center><h2>Usuario no encontrado</h2></center>";
                    } else {


                        $resultadoPrestamoActivo = $verificarPrestamosActivos->PrestamoActivoElementosDocumento($documento_usuario);

                        // var_dump($resultadoPrestamoActivo);
                        if ($resultadoPrestamoActivo->num_rows > 0) {

                            echo "<center><h2>Usuario con prestamos activos </h2></center>";


                            while ($datos = $resultadoPrestamoActivo->fetch_assoc()) { ?>

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Id prestamo</th>
                                            <th scope="col">Elemento</th>
                                            <th scope="col">Doc. responsable</th>
                                            <th scope="col">Nom. responsable</th>
                                            <th scope="col">Fecha prestamo</th>
                                            <th scope="col">Hora prestamo</th>
                                            <th scope="col">observaciones</th>
                                            <th scope="col">Estado</th>
                                            <th scope="col">Acciones</th>


                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>

                                            <td><?php echo $datos['id_prestamo']    ?></td>

                                            <td><?php echo $datos['serial']    ?></td>

                                            <td><?php echo $datos['numero_documento']    ?></td>
                                            <td><?php echo $datos['tipo_dispositivo']    ?></td>
                                            
                                            <td><?php echo $datos['nombre'] . " " . $datos['apellido']   ?></td>
                                            <td><?php echo $datos['fecha_prestamo']    ?></td>
                                            <td><?php echo $datos['hora_prestamo']    ?></td>



                                            <td><?php echo $datos['observaciones']    ?></td>
                                            <td><?php echo $datos['estado_prestamo'] ?></td>


                                            <td>
                                                <!--  <a class="btn btn-info bg-success" href="añadirObservacion.php?idprestamo=<?php echo
                                                                                                                                $datos['id_prestamo']; ?>" style="color:white">observacion</a>-->
                                                <!-- <a class="btn btn-info bg-success" href="cerrarPrestamoAmbiente.php?idprestamo=<?php echo $datos['id_prestamo']; ?>&idAmbiente=<?php echo $datos['id_numero_ambiente']; ?>" style="color:white">Entregar</a> -->

                                                <a class="btn btn-info bg-success" href="añadirObservacion.php?idprestamo=<?php echo $datos['id_prestamo']; ?>" style="color:white">observacion</a>

                                                <!-- <a class="btn btn-info bg-success" href="verPrestamosActivos.php?idprestamo=<?php echo $datos['id_prestamo']; ?>" style="color:white">Entregar</a> -->

                                                <a class="btn btn-info bg-success" href="cerrarPrestamoAmbiente.php?idprestamo=<?php echo $datos['id_prestamo']; ?>&idAmbiente=<?php echo $datos['id_numero_ambiente']; ?>" style="color:white">Entregar</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>

                            <?php

                            }

                            //fin verificacion prestamos 



                        } else {


                            $fila = $obtener_usuario_id->fetch_assoc();
                            ?>
                            <form action="./registrarPrestamoElementos.php" method="post">



                                <div class="registro-div registro_usuario-input">
                                    <h3>Datos Usuario</h3>
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
                                            <select name="cargador" id="" class="select-registro">
                                                <option value="si">Si</option>
                                                <option value="no">No</option>
                                            </select>
                                            <select name="mouse" id="" class="select-registro">
                                                <option value="no">No</option>
                                                <option value="si">Si</option>
                                            </select>
                                            <select name="rol" id="" class="select-registro">
                                                <option value="id_rol"><?php echo $fila['nombre_rol']; ?></option>
                                            </select>

                                        </div>
                                    </div>
                                </div>
                                <?php
                                $Elementos = $mostrarElemento->mostrarElementosDisponibles();

                                // var_dump($Elementos);

                                if ($Elementos->num_rows == 0) {
                                    echo "<center><h2>No hay dispositivos disponibles</h2></center>";
                                } else {
                                ?>
                                    <input class="btn-registro btn-registro-dispositivo" type="submit" value="prestar" name=prestar>


                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">serial</th>
                                                <th scope="col">placa</th>
                                                <th scope="col">Tipo</th>
                                                <th scope="col">marca</th>
                                                <th scope="col">modelo</th>


                                            </tr>
                                        </thead>
                                        <tbody>


                                            <?php

                                            foreach ($Elementos as $Elemento) {

                                            ?>

                                                <tr>
                                                    <td><?php echo $Elemento['serial']; ?></td>
                                                    <td><?php echo $Elemento['placa']; ?></td>
                                                    <td><?php echo $Elemento['tipo_dispositivo'] ?></td>
                                                    <td><?php echo $Elemento['marca'] ?></td>
                                                    <td><?php echo $Elemento['modelo'] ?></td>
                                                    <td><input type="checkbox" name="equipos[]" value="<?php echo $Elemento['serial']; ?>"></td>
                                                    <td><input type="radio" name="cargador_<?php echo $Elemento['serial'] ?>" value="si"></td>
                                                    <td><input type="radio" name="mouse_<?php echo $Elemento['serial'] ?>" value="si"></td>

                                                </tr>

                                            <?php

                                            }
                                            ?>

                                        </tbody>
                                    </table>


                                    <label for="">observaciones</label><br>
                                    <textarea rows="10" cols="40" name="observaciones" placeholder=""></textarea>


                                <?php
                                }
                                ?>







                            </form>



                <?php
                        }
                    }
                }


                ?>





                <?php



                if (isset($_POST['prestar'])) {

                    // $ambiente = $_POST['inputselect'];
                    $numeroCedula = $_POST['numeroCedula'];
                    $equipos_seleccionados = $_POST['equipos'];
                    $mouse = $_POST['mouse'];
                    // $cargador=$_POST['cargador'];

                    echo $numeroCedula . "-";
                    echo $equipos_seleccionados[0];

                    if (empty($_POST['observaciones'])) {
                        $observaciones = NULL;
                    } else {
                        $observaciones = $_POST['observaciones'];
                    }


                    $nuevoPrestamo->id_prestamo = NULL;
                    $nuevoPrestamo->fecha_prestamo = date('Y-m-d');
                    $nuevoPrestamo->hora_prestamo = date('h:i:s');
                    $nuevoPrestamo->fecha_entrega = NULL;
                    $nuevoPrestamo->hora_entrega =  NULL;
                    $nuevoPrestamo->observaciones = $observaciones;
                    $nuevoPrestamo->id_numero_ambiente = NULL;
                    $nuevoPrestamo->numero_documento = $numeroCedula;
                    $nuevoPrestamo->estado_prestamo = "activo";
                    // $nuevoPrestamo->registrarPrestamo();
                    $id = $nuevoPrestamo->registrarPrestamo();
                    echo "id: " . $id;

                    // $nuevoPrestamo



                    foreach ($equipos_seleccionados as $equipo) {

                        echo "------ " . $equipo . "-----";

                        $cargador = isset($_POST['cargador_' . $equipo]) ? $_POST['cargador_' . $equipo] : 'no';
                        $mouse = isset($_POST['mouse_' . $equipo]) ? $_POST['mouse_' . $equipo] : 'no';

                        $detallePrestamo->id_detalle_prestamo = NULL;
                        $detallePrestamo->cantidad = NULL;
                        $detallePrestamo->id_prestamo = $id;
                        $detallePrestamo->serial = $equipo;
                        $detallePrestamo->cargador = $cargador;
                        $detallePrestamo->mouse = $mouse;
                        $detallePrestamo->registrarDetallePrestamo();




                        echo $cargador . " " . $equipo . "<br>";
                        echo $mouse . " " . $equipo . "<br>";
                    }



                    // date_default_timezone_set("UTC");


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

            </div>
        </div>
    </div>
    <div class="barra_inferior">
    </div>







    <!-- <button class="btn-1 btn-0">Prestamo de dispositivos</button>
    <button class="btn-1" type="submit" >Prestamo de ambientes</button>
    <button class="btn-1">Registro de administrador</button> -->
    <!-- <script>
  // Obtener todos los radios
  const radios = document.querySelectorAll('input[type="radio"]');

  // Agregar un evento clic a cada radio
  radios.forEach(radio => {
    radio.addEventListener('click', () => {
      // Si el radio estaba seleccionado, deseleccionarlo
      if (radio.checked) {
        radio.checked = false;
      } else {
        // Si el radio no estaba seleccionado, seleccionarlo
        radio.checked = true;
      }
    });
  }); -->
    </script>
</body>

</html>