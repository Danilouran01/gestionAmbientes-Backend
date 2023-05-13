<?php 
// session_start();
// if(!isset($_SESSION['numero_documento'])){
//     header('Location: index.php');
//     exit();
// } -->


require_once "./logicaAgregarElementosPrestamo.php";

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
    <script src="js/funcion.js"></script>
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
                <li><a class="dropdown-item" href="#">Editar usuarios</a></li>
                <li><a class="dropdown-item" href="cerrar_sesion.php">Cerrar sesión</a></li>
            </ul>
        </div>



    </div>


    <!-- <div class="flex">
    <div class="botones-principales">
      <a href="./registrarPrestamoAmbiente.php" class="btn-1">Prestamo de ambientes</a>
      <a href="./prestamo_dispositivos.php" class="btn-1 btn-0">Prestamo de dispositivos</a>
    </div> -->

    <div class="herencia">
        <div class="buscador">
            <h3 class="titulo_herencia">Editar usuario</h3>
            <div class="buscador-int">
                
                <form action="./agregarElementoPrestamo.php" method="get">
                    <input class="input-b btns-b" placeholder="Buscar" type="text" name="serialPlaca">
                    <input type="submit" value="Consultar" name="consultar" class="btn-consultar">

                    <select class="selec-b btns-b" name="tipoDispositivo" id="">
                        <option value="null_0">Todos</option>
                        <?php
                        foreach ($tipo_dispositivo as $tipo) { ?>


                            <option value="<?php echo $tipo['id_tipo_dispositivo']   ?>"><?php echo $tipo['tipo_dispositivo']   ?></option>

                        <?php

                        }
                        ?>
                    </select>
                    <input type="hidden" name="idPrestamo" value="<?php echo $id_prestamo ?>">


                </form>

                <a href="./ver_elemento.php" class="btn-activos">Ver elementos</a>

                <a href="./registrarPrestamoAmbiente.php" class="btn-activos">Prestar ambiente</a>
                <a href="./registrarPrestamoElementos.php" class="btn-activos">Prestar Elementos</a>
            </div>
            <div class="bd-prestamo-ambientes">
            </div>
        </div>

        <div class="">
            <h3 class="text-center">Id prestamo: <a href="./VerDetallePrestamoElementos.php?idPrestamo=<?php   echo  $id_prestamo  ?>"><?php echo  $id_prestamo ?></a></h3>
            
            <h4>Cedula:<?php echo  $usuario_cedula ?></h4>
            <h4>Nombre:<?php echo $usuario_nombre . "" . $usuario_apellido ?></h4>



            <?php
            if (isset($_REQUEST['consultar'])) {
                $id_prestamo = $_REQUEST['idPrestamo'];
                $tipo_dispositivo = $_REQUEST['tipoDispositivo'];

                 $serial_placa = isset($_REQUEST['serialPlaca']) ? (strtolower($_REQUEST['serialPlaca']) == 'null' ? 'null_0' : strtolower($_REQUEST['serialPlaca'])) : 'null_0';

                $filtrarElementos = new Elemento();
                $elementos_filtrados = $filtrarElementos->obtenerElementoDisponiblesPorSerialTipo($serial_placa, $tipo_dispositivo);

                if ($elementos_filtrados && count($elementos_filtrados) > 0) {


                    if (count($elementos_filtrados) == 1) {
                        echo "Se encontró un elemento disponible."; ?>

                        <form action="./procesoAgregarElementosPrestamo.php" method="post">
                            <input type="hidden" name="idPrestamo" value="<?php echo $id_prestamo ?>">


                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th scope="col">Serial</th>
                                        <th scope="col">Placa</th>
                                        <th scope="col">Tipo</th>
                                        <th scope="col">Marca</th>
                                        <th scope="col">Modelo</th>
                                        <th scope="col">Seleccionarlo</th>
                                        <th scope="col">Cargador</th>
                                        <th scope="col">Mouse</th>
                                        <th scope="col">Agregar</th>


                                    </tr>
                                </thead>
                                <tbody>


                                    <?php

                                    foreach ($elementos_filtrados as $elemento_filtrado) {

                                    ?>

                                        <tr>
                                            <td><?php echo $elemento_filtrado['serial']; ?></td>
                                            <td><?php echo $elemento_filtrado['placa']; ?></td>
                                            <td><?php echo $elemento_filtrado['tipo_dispositivo'] ?></td>
                                            <td><?php echo $elemento_filtrado['marca'] ?></td>
                                            <td><?php echo $elemento_filtrado['modelo'] ?></td>
                                            <td><input type="checkbox" name="equipos[]" value="<?php echo $elemento_filtrado['serial']; ?>"></td>

                                            <td><input type="checkbox" name="cargador_<?php echo $elemento_filtrado['serial'] ?>" value="si"></td>
                                            <td><input type="checkbox" name="mouse_<?php echo $elementos_filtrado['serial'] ?>" value="si"></td>
                                            <td><input class="bg-success" type="submit" value="Agregar" name="agregar" style="color:white; margin: 0 auto; display: block;"> </td>


                                        </tr>

                                    <?php

                                    }
                                    ?>



                                </tbody>
                            </table>
                        </form>

                    <?php } else {
                        echo "Se encontraron " . count($elementos_filtrados) . " elementos disponibles.";


                    ?>

                        <table class="table ">
                            <thead>
                                <tr>
                                    <th scope="col">serial</th>
                                    <th scope="col">placa</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">marca</th>
                                    <th scope="col">modelo</th>
                                    <th scope="col">seleccionarlo</th>
                                    <th scope="col">Cargador</th>
                                    <th scope="col">Mouse</th>


                                </tr>
                            </thead>
                            <tbody>


                                <?php

                                foreach ($elementos_filtrados as $elemento_filtrado) {

                                ?>

                                    <tr>
                                        <td><?php echo $elemento_filtrado['serial']; ?></td>
                                        <td><?php echo $elemento_filtrado['placa']; ?></td>
                                        <td><?php echo $elemento_filtrado['tipo_dispositivo'] ?></td>
                                        <td><?php echo $elemento_filtrado['marca'] ?></td>
                                        <td><?php echo $elemento_filtrado['modelo'] ?></td>
                                        <td><input type="checkbox" name="equipos[]" value="<?php echo $elemento_filtrado['serial']; ?>"></td>

                                        <td><input type="checkbox" name="cargador_<?php echo $elemento_filtrado['serial'] ?>" value="si"></td>
                                        <td><input type="checkbox" name="mouse_<?php echo $elementos_filtrado['serial'] ?>" value="si"></td>

                                    </tr>

                                <?php

                                }
                                ?>



                            </tbody>
                        </table>


            <?php
                    }
                } else {
                    $mensaje = "¡Elemento no encontrado!";
                    echo "<script>setTimeout(function(){ window.location.href='agregarElementoPrestamo.php?idPrestamo=$id_prestamo'; alert('$mensaje'); }, 500);</script>";
                }
            }


            ?>




            <h3 class="text-center">Informacion elementos</h3>



            <form action="./procesoAgregarElementosPrestamo.php" method="post">
                <input type="hidden" name="idPrestamo" value="<?php echo $id_prestamo ?>">
                <input class="bg-success" type="submit" value="Agregar" name="agregar" style="color:white; margin: 0 auto; display: block;">
                <table class="table ">
                    <thead>
                        <tr>
                            <th scope="col">serial</th>
                            <th scope="col">placa</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">marca</th>
                            <th scope="col">modelo</th>
                            <th scope="col">seleccionarlo</th>
                            <th scope="col">Cargador</th>
                            <th scope="col">Mouse</th>


                        </tr>
                    </thead>
                    <tbody>


                        <?php

                        foreach ($elementos_disponibles as $Elemento) {

                        ?>

                            <tr>
                                <td><?php echo $Elemento['serial']; ?></td>
                                <td><?php echo $Elemento['placa']; ?></td>
                                <td><?php echo $Elemento['tipo_dispositivo'] ?></td>
                                <td><?php echo $Elemento['marca'] ?></td>
                                <td><?php echo $Elemento['modelo'] ?></td>
                                <td><input type="checkbox" name="equipos[]" value="<?php echo $Elemento['serial']; ?>"></td>

                                <td><input type="checkbox" name="cargador_<?php echo $Elemento['serial'] ?>" value="si"></td>
                                <td><input type="checkbox" name="mouse_<?php echo $Elemento['serial'] ?>" value="si"></td>

                            </tr>

                        <?php

                        }
                        ?>


                    </tbody>
                </table>


            </form>




        </div>
    </div>
    <!-- </div> -->
    <!-- <div class="barra_inferior">
  </div> -->


</body>



</html>