<?php 
require_once "./logicaVerDetallePrestamoElementos.php";

if (!empty($_REQUEST['idPrestamoObservacion'])) {
    $id_prestamo=$_REQUEST['idPrestamoObservacion'];
    
    $añadirObservacion=new Prestamo();
    $prestamo=$añadirObservacion->obtenerPrestamosElementosUsuarioIdPrestamo($id_prestamo);
    $row = $prestamo->fetch_assoc();
    $modificar_observacion=true;
    
    
    $color = "";
    if (isset($_GET["modificado"])) {
            $color = "green";
            $texto = "Modificado";
        } else {
            $color = "red";
            $texto = "No modificado";
        }
    } 
    
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./Css/editar_usuario.css">
    <script src="https://kit.fontawesome.com/503089e863.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./Css/global.css">
    <link rel="stylesheet" href="./Css/verDetallePrestamo.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@200&display=swap" rel="stylesheet">
    <title>Gestión de ambientes</title>
    <style> a {
    text-decoration: none; /* Quita el subrayado */
  }</style>

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
                <li><a class="dropdown-item" href="#">Editar usuarios</a></li>
                <li><a class="dropdown-item" href="cerrar_sesion.php">Cerrar sesión</a></li>
            </ul>
        </div>



    </div>

    <?php if (!empty($modificar_observacion)) { ?>

<div class="modal fade show" id="nueva_observacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: block;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir observacion</h1>
        <a class="btn-registro btn-registro-ambiente" href="VerDetallePrestamoElementos.php?idPrestamo=<?php echo $id_prestamo  ?>"><i class="fas fa-times"></i>
</a>

      </div>
      <div class="modal-body">
        <div class="registro-div registro_usuario-input">
          <form class="registro registro_usuario" id="registro" action="./procesoAñadirObservacion.php" method="get">
            <div class="registro-input registro-usuario-input">
              <div class="rgts-input rgts-usuario-input">
                <input class="campos-registro" type="hidden" value="<?php echo $row['id_prestamo']; ?>" name="idPrestamo">
                <input class="campos-registro" type="hidden" value="VerDetallePrestamoElementos.php" name="paginaOrigen">
                <label class="text-center" for="">Ingrese observacion</label>
                <label class="text-center" style="color: <?php echo $color; ?>"><?php echo $texto; ?></label>
                <textarea rows="15" cols="50" name="observacion" placeholder=""><?php echo $row['observaciones']   ?></textarea>
                <input class="btn-registro btn-registro-ambiente" type="submit" value="añadir" name="btnObservacion">
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal-backdrop fade show"></div>
<body class="modal-open">

<?php } ?>

    <!-- <div class="flex">
    <div class="botones-principales">
      <a href="./registrarPrestamoAmbiente.php" class="btn-1">Prestamo de ambientes</a>
      <a href="./prestamo_dispositivos.php" class="btn-1 btn-0">Prestamo de dispositivos</a>
    </div> -->

    <div class="herencia">
        <div class="buscador">
            <h3 class="titulo_herencia">Detalle prestamo Elementos</h3>
            <div class="buscador-int">

                <a class="btn-b btns-b" href="./registrarPrestamoElementos.php">Prestar Elementos</a>
                <a class="btn-b btns-b" href="./verPrestamosElementos.php">Historial</a>
                <a class="btn-b btns-b" href="./registrarPrestamoAmbiente.php">Prestar Ambiente</a>
            </div>
            <div class="bd-prestamo-ambientes">
            </div>
        </div>
        <div class="contenido">
            <h3 class="text-center">Prestamo: <?php echo $id_prestamo  ?></h3>

            <div class="text-center">
            <a class="btn btn-info bg-success" href="VerDetallePrestamoElementos.php?idPrestamo=<?php echo $id_prestamo ?>&idPrestamoObservacion=<?php echo $id_prestamo ?>" style="color:white">observacion</a>

                <?php if ($estado_prestano == "activo") { ?>
                    <a class="btn btn-info bg-success " href="agregarElementoPrestamo.php?idPrestamo=<?php echo $id_prestamo  ?>" style="color:white">añadir elemento</a>
                <?php
                } ?>
            </div>

            <?php if (!empty($_REQUEST['Serial'])) { ?>


                <h3 class="text-center">Elementos A modificar</h3>
                <form class="elementos-form" action="./procesoModificarDetallePrestamo.php" method="post">

                    <input type="hidden" name="id_prestamo" value="<?php echo $id_prestamo ?>">

                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">Elemento</th>
                                <th scope="col" class="text-center">Tipo dispositivo</th>
                                <th scope="col" class="text-center">mouse</th>
                                <th scope="col" class="text-center">Cargador</th>
                                <th scope="col" class="text-center">Acciones</th>



                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">
                                    <input class="text-center" type="text" name="serial" value="<?php echo $serial ?>" readonly>
                                </td>
                                <td class="text-center">
                                    <?php echo $tipo_elemento ?>
                                </td>
                                <td class="text-center">
                                    <select class="text-center" name="mouse">

                                        <option value="<?php echo $mouseop1 ?>"><?php echo $mouseop1  ?></option>
                                        <option value="<?php echo $mouseop2 ?>"><?php echo $mouseop2  ?></option>

                                    </select>
                                </td>
                                <td class="text-center">
                                    <select class="text-center" name="cargador">

                                        <option value="<?php echo $cargadorop1 ?>"><?php echo $cargadorop1 ?></option>
                                        <option value="<?php echo $cargadorop2 ?>"><?php echo $cargadorop2 ?></option>

                                    </select>
                                </td>

                                <td class="text-center">
                                    <input class="btn btn-info " type="submit" name="editar_detalle" value="Guardar">
                                    <a class="btn btn-info " href="./VerDetallePrestamoElementos.php?idPrestamo=<?php echo $id_prestamo ?>">Detalles generales</a>
                                </td>
                            </tr>


                        </tbody>
                    </table>
                </form>

            <?php
            }
            ?>






            <div class="prestamo-details" style="margin-top: 20px;">
                <h4 class="prestamo-detail">N° documento: <?php echo $usuario_cedula ?></h4>
                <h4 class="prestamo-detail">Nombre: <?php echo $usuario_nombre . " " . $usuario_apellido ?></h4>
                <h4 class="prestamo-detail">Fecha hora prestamo:<?php echo $fecha_prestamo . " / " . $hora_prestamo ?></h4>
                <h4 class="prestamo-detail">Fecha y hora entrega:<?php echo $fecha_entrega . " / " . $hora_entrega ?></h4>
                <h4 class="prestamo-detail">estado: <?php echo $estado_prestano ?></h4>

                <div class="prestamo-observacion">
                    <h4 class="prestamo-detail">Observaciones:</h4>
                    <p><?php echo $observacion ?></p>
                </div>
            </div>



            <div style="width: 40%; margin: 0 auto;">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">Categoría</th>
                            <th scope="col" class="text-center">Cantidad de elementos</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($cantidad_elementos as $cantidad_elemento) { ?>
                            <tr>
                                <td class="text-center"><?php echo $cantidad_elemento["tipo_dispositivo"] ?></td>
                                <td class="text-center"> <?php echo $cantidad_elemento["cantidad"] ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                </table>
            </div>



            <h3 class="text-center">Elementos</h3>

            <table class="table text-center">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">cant.</th>
                        <th scope="col" class="text-center">Elemento</th>
                        <th scope="col" class="text-center">Tipo dispositivo</th>
                        <th scope="col" class="text-center">mouse</th>
                        <th scope="col" class="text-center">Cargador</th>
                        <th scope="col" class="text-center">Estado</th>
                        <th scope="col" class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $cant = 1;
                    foreach ($elementos as $elemento) { ?>

                        <tr>
                            <td class="text-center"><?php echo $cant ?></td>
                            <td class="text-center"><?php echo $elemento['serial']    ?></td>
                            <td class="text-center"><?php echo $elemento['tipo_dispositivo']    ?></td>
                            <td class="text-center"><?php echo $elemento['mouse'] ?></td>
                            <td class="text-center"><?php echo $elemento['cargador'] ?></td>
                            <td class="text-center"><?php echo $elemento['estado_elemento'] ?></td>
                            <td class="text-center">
                                <a class="btn btn-info bg-success " href="desasociarElementoPrestamo.php?idPrestamo=<?php echo $id_prestamo  ?>&Serial=<?php echo $elemento['serial']     ?>" style="color:white">Desasociar elemento</a>
                                <a class="btn btn-info bg-success " href="verDetallePrestamoElementos.php?idPrestamo=<?php echo $id_prestamo  ?>&Serial=<?php echo $elemento['serial']  ?>" style="color:white">Editar</a>
                            </td>
                        </tr>

                    <?php
                        $cant += 1;
                    }
                    ?>
                </tbody>
            </table>

        </div>
    </div>
    <!-- </div> -->
    <!-- <div class="barra_inferior">
    </div> -->


<?php
if (!empty($_REQUEST['idPrestamo']) && !empty($_REQUEST['agregar'])=='true') {
    $mensaje = "¡Elementos agregados correctamente!";
    echo "<script>setTimeout(function(){ alert('$mensaje'); }, 100);</script>";
    
    
}


?>

</body>




</html>