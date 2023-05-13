<?php 


if (!isset($_REQUEST['idAmbiente'])) {

    echo "pagina no disponible";
    header("Location: ver_ambiente.php");
} else {
    require_once "./classAmbientes.php";
    require_once "./classAmbienteElemento.php";
    require_once "./classElementosEstaticos.php";


    $id_ambiente = $_REQUEST['idAmbiente'];



    $verAmbiente = new Ambientes();
    $informacion_ambiente = $verAmbiente->obtenerAmbientePorId($id_ambiente);
    $informacion = $informacion_ambiente->fetch_assoc();

    $verElementosEstaticos = new ElementosEstaticos();
    $elementos = $verElementosEstaticos->verElementosEstaticosIdAmbiente($id_ambiente);
    $categorias_elemento = $verElementosEstaticos->mostrarCategoriaElemento();




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
        <script src="./js/funcion.js"></script>

        <style>
            table input,
            select {
                border: none;

            }


            
        </style>



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





            <!-- MODAL NUEVA OBSERVACION -->


            <div class="modal fade" id="nueva_observacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir observacion</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="registro-div registro_usuario-input">
                                <form class="registro registro_usuario" id="registro" action="./procesoAgregarObservacionAmbiente.php" method="post">
                                    <div class="registro-input registro-usuario-input">
                                        <div class="rgts-input rgts-usuario-input">

                                            <input class="campos-registro" type="hidden"  value="<?php echo $id_ambiente ?>" name="numeroAmbiente">
                                            <label class="text-center" for="">Ingrese observacion</label>
                                            <textarea rows="15" cols="50" name="observacion" placeholder=""></textarea>

                                            <input class="btn-registro btn-registro-ambiente" type="submit" value="registrar" name="registrar">

                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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


        <!-- <div class="flex">
        <div class="botones-principales">
            <a href="./registrarPrestamoAmbiente.php" class="btn-1">Prestamo de ambientes</a>
            <a href="./registrarPrestamoElementos.php" class="btn-1 btn-0">Prestamo de dispositivos</a>
        </div> -->
        <div class="herencia">
            <div class="buscador">
                <h3 class="titulo_herencia">Prestamo de ambientes</h3>
                <div class="buscador-int">
                    <form action="./verInformacionAmbiente.php" method="get">

                        <input type="hidden" name="idAmbiente" value="<?php echo $id_ambiente; ?>">
                        <input class="input-b btns-b" placeholder="Buscar" type="text" id="serial" name="serial">
                        <select class="selec-b btns-b" name="categoria" id="">
                            <?php
                            if ($categorias_elemento->num_rows > 0) {
                                # code...

                                foreach ($categorias_elemento as $categoria_elemento) {
                                    # code...
                            ?>
                                    <option value="<?php echo $categoria_elemento['id_categoria']  ?>"><?php echo $categoria_elemento['nombre_categoria']  ?></option>
                            <?php }
                            } ?>
                        </select>
                        <input type="submit" value="Consultar" name="consultar" class="btn-consultar">
                    </form>



                    <!-- <select class="selec-b btns-b" name="" id="">
                        <option value="">Filtro</option>
                    </select> -->

                    <button class="btn-b btns-b" data-bs-toggle="modal" data-bs-target="#nuevo_ambiente">Añadir ambiente</button>
                    <button class="btn-b btns-b" data-bs-toggle="modal" data-bs-target="#nueva_observacion">Añadir observacion</button>
                    <a href="./verObservacionesAmbiente.php?idAmbiente=<?php echo $id_ambiente  ?>" class="btn-activos">Ver observaciones </a>


                    <a href="./verPrestamosActivos.php" class="btn-activos">Prestamo Ambientes </a>
                    <a href="./verPrestamosElementos.php" class="btn-activos">Prestamo Elementos </a>
                    <a href="./ver_ambiente.php" class="btn-activos">Ambientes </a>

                </div>
                <div class="bd-prestamo-ambientes">
                </div>
            </div>
            <h2 class="text-center">Información Ambiente: <?php echo $informacion['id_numero_ambiente']; ?></h2>

<!-- <div class="text-center mt-1">
  <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#nueva_observacion">Añadir Observación</button>
</div> -->


  <h4>Piso: <?php echo $informacion['piso']; ?></h4>
  <h4>Cantidad de sillas: <?php echo $informacion['cantidad_sillas']; ?></h4>

<h4 >Estado: <?php echo $informacion['estado_ambiente']; ?></h4>


            <?php

            if (isset($_REQUEST['consultar'])) {
                $serial_elemento = $_REQUEST['serial'];
                $ambiente_id = $_REQUEST['idAmbiente'];
                $categoria = $_REQUEST['categoria'];

                if ($_REQUEST['serial']) {
                    $serial_placa_elemento = $_REQUEST['serial'];
                } else {
                    $serial_placa_elemento = NULL;
                }


                if ($_REQUEST['categoria']) {
                    $categoria = $_REQUEST['categoria'];
                } else {
                    $categoria = NULL;
                }

                $elementos_estaticos = $verElementosEstaticos->obtenerElemetosEstaticosPorIdAmbienteSerialPlaca($ambiente_id, $serial_placa_elemento, $categoria);

                if ($elementos_estaticos->num_rows < 1) {
                    echo "<script>
        setTimeout(function() {
           
            alert('elemento $serial_elemento no encontrado');
        }, 500);
    </script>";
                } else { ?>

                    <table class="table ">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">serial</th>
                                <th scope="col" class="text-center">categoria</th>
                                <th scope="col" class="text-center">marca</th>
                                <th scope="col" class="text-center">modelo</th>
                                <th scope="col" class="text-center">estado</th>
                                <th scope="col" class="text-center">desasociar</th>

                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($elementos_estaticos as $elemento_estatico) {
                                # code...
                            ?>
                                <tr>
                                    <td class="text-center"><?php echo $elemento_estatico['id_elemento_estatico']; ?></td>
                                    <td class="text-center"><?php echo $elemento_estatico['nombre_categoria']; ?></td>
                                    <td class="text-center"><?php echo $elemento_estatico['marca']; ?></td>
                                    <td class="text-center"><?php echo $elemento_estatico['modelo']; ?></td>
                                    <td class="text-center"><?php echo $elemento_estatico['nombre_estado_estatico']; ?></td>
                                    <td class="text-center"> <a class="btn btn-info bg-success" href="desasociarElementoAmbiente.php?serial=<?php echo $elemento_estatico['id_elemento_estatico']; ?>&id_ambiente=<?php echo $ambiente_id; ?>" style="color:white">Desasociar</a>
                                    </td>
                                </tr>
                            <?php
                            } ?>
                        </tbody>
                    </table>

                <?php
                }
            }




            if ($informacion_ambiente->num_rows < 1) {
                echo "<script>setTimeout(function(){ alert('Ambiente no encontrado'); }, 100);</script>";
            } else { ?>




                    <?php

                    $cantidadElemento = new AmbienteElemento();
                    $resultado = $cantidadElemento->CantidadElementoIdAmbiente($id_ambiente);

                    if ($resultado->num_rows < 1 && $elementos->num_rows < 1) { ?>
                        <h2 style="text-align: center;">Ambiente sin elementos asociados</h2>
                    <?php   } else {

                    ?>



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
                                    while ($fila = mysqli_fetch_assoc($resultado)) { ?>
                                        <tr>
                                            <td class="text-center"><?php echo $fila["nombre_categoria"] ?></td>
                                            <td class="text-center"> <?php echo $fila["cantidad_elementos"] ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                            </table>
                        </div>




                        <h2 style="text-align: center;">Elementos</h2>



                        <table class="table table-striped ">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">serial</th>
                                    <th scope="col" class="text-center">categoria</th>
                                    <th scope="col" class="text-center">marca</th>
                                    <th scope="col" class="text-center">modelo</th>
                                    <th scope="col" class="text-center">estado</th>
                                    <th scope="col" class="text-center">desasociar</th>

                                </tr>
                            </thead>

                            <tbody>
                                <?php foreach ($elementos as $elemento) {
                                    # code...
                                ?>
                                    <tr>
                                        <td class="text-center"><?php echo $elemento['id_elemento_estatico']; ?></td>
                                        <td class="text-center"><?php echo $elemento['nombre_categoria']; ?></td>
                                        <td class="text-center"><?php echo $elemento['marca']; ?></td>
                                        <td class="text-center"><?php echo $elemento['modelo']; ?></td>
                                        <td class="text-center"><?php echo $elemento['nombre_estado_estatico']; ?></td>
                                        <td class="text-center"> <a class="btn btn-info bg-success" href="desasociarElementoAmbiente.php?serial=<?php echo $elemento['id_elemento_estatico']; ?>&id_ambiente=<?php echo $informacion['id_numero_ambiente']; ?>" style="color:white">Desasociar</a>
                                        </td>
                                    </tr>
                                <?php
                                } ?>
                            </tbody>
                        </table>

                <?php
                    }
                }

                ?>



<?php   
   if (!empty($_REQUEST['resultado'])  && $_REQUEST['resultado']=='true') {
    $mensaje = "¡Elementos asociados correctamente!";
    echo "<script>setTimeout(function(){ alert('$mensaje'); }, 500);</script>";
   }
?>


    </body>

    </html>
<?php
}
?>