<?php  
require_once "./classAmbientes.php";
require_once "./classAmbienteElemento.php";
require_once "./classElementosEstaticos.php";


// if (empty($_REQUEST['idAmbiente'])) {
//     header("Location: ver_ambiente.php");
// }



$id_ambiente = $_REQUEST['idAmbiente'];



//    header("Location: asociarAmbienteElemento.php?resultado=$elemento");



//ver info  ambientes
$verAmbiente = new Ambientes();
$informacion_ambiente = $verAmbiente->obtenerAmbientePorId($id_ambiente);
$informacion = $informacion_ambiente->fetch_assoc();


//


$verElementosEstaticos = new ElementosEstaticos();

$elementos = $verElementosEstaticos->verElementosEstaticosIdAmbiente($id_ambiente);


$elementos_disponibles = $verElementosEstaticos->obtenerElementosEstaticosPorEstado(1);





$cantidadElemento = new AmbienteElemento();
$cantidad_elemento = $cantidadElemento->CantidadElementoIdAmbiente($id_ambiente);






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
                <li><a class="dropdown-item" href="./ver_usuario.php">Editar usuarios</a></li>
                <li><a class="dropdown-item" href="cerrar_sesion.php">Cerrar sesión</a></li>
            </ul>
        </div>
    </div>



    <div class="herencia">
        <div class="buscador">
            <h3 class="titulo_herencia">Editar usuario</h3>
            <div class="buscador-int">
                <!-- <input class="input-b btns-b" type="searc" placeholder="Buscar"> -->
                <form action="./asociarAmbienteElemento.php" method="get">
                    <!-- <input class="input-b btns-b" placeholder="Buscar" type="number" id="documento" name="documento" required>
                        <input type="submit" value="Consultar" name="consultar" class="btn-consultar"> -->

                    <input class="input-b btns-b" type="text" placeholder="Buscar" name="buscar">
                    <input type="hidden" name="idAmbiente" value="<?php echo $informacion['id_numero_ambiente']; ?>">


                    <input type="submit" value="Consultar" name="consultar">

                </form>
                <!-- <button class="btn-b btns-b" data-bs-toggle="modal" data-bs-target="#registrar_aprendiz">Registrar aprendiz</button>
                <button class="btn-b btns-b" data-bs-toggle="modal" data-bs-target="#registrar_instructor">Registrar instructor</button> -->
                <!-- <button class="btn-b btns-b" data-bs-toggle="modal" data-bs-target="#registrar_administrador">Registrar administrador</button> -->

            </div>
            <div class="bd-prestamo-ambientes">
            </div>
        </div>

        <div class="">
        <h2 style="text-align: center;">informacion Ambiente : <?php echo $informacion['id_numero_ambiente']; ?></h3> <br>

            <?php


            if (isset($_REQUEST['consultar'])) {
                $serial_placa = $_REQUEST['buscar'];
                $id_ambiente = $_REQUEST['idAmbiente'];

                $elementosEstaicos = $verElementosEstaticos->obtenerElementosEstaticosDisponiblesId($serial_placa);

                if ($elementosEstaicos->num_rows < 1) {

                    $mensaje = "¡Elemento no encontrado!";
                    echo "<script>setTimeout(function(){ alert('$mensaje'); }, 500);</script>";
                } else { ?>


                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Serial</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Marca</th>
                                <th scope="col">Modelo</th>
                                <th scope="col">asociar</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php while ($elementoEstaico = $elementosEstaicos->fetch_assoc()) {
                                $serial = $elementoEstaico['id_elemento_estatico'];
                            ?>
                                <tr>
                                    <td><?= $serial ?></td>
                                    <td><?= $elementoEstaico['categoria_elemento'] ?></td>
                                    <td><?= $elementoEstaico['marca'] ?></td>
                                    <td><?= $elementoEstaico['modelo'] ?></td>
                                    <td>
                                        <a class="btn btn-info bg-success" href="procesoAsociarElementoAmbiente.php?serial=<?= $serial_placa ?>&idAmbiente=<?= $id_ambiente ?>" style="color:white">Asociar</a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
            <?php
                }
            }
            ?>





                <div class="info-amb">

                    <h4 style="padding-left: 10px;">piso:<?php echo $informacion['piso'];  ?></h4>
                    <h4 style="padding-left: 10px;">estado:<?php echo $informacion['estado_ambiente'];  ?></h4>

                </div>



                <?php


                if ($cantidad_elemento->num_rows < 1) { ?>
                    <h2 style="text-align: center;">Ambiente sin elementos asociados</h2>
                <?php
                } else {

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
                                while ($fila = mysqli_fetch_assoc($cantidad_elemento)) { ?>
                                    <tr>
                                        <td class="text-center"><?php echo $fila["nombre_categoria"] ?></td>
                                        <td class="text-center"> <?php echo $fila["cantidad_elementos"] ?></td>
                                    </tr>
                                <?php
                                }

                                ?>
                        </table>
                    </div>
                <?php
                }
                ?>





                <form action="./procesoAsociarElementoAmbiente.php" method="post">
                    <center><input class="btn btn-info bg-success" type="submit" name="asociar" value="Guardar" style="color: white;"></center>

                    <input type="hidden" name="idAmbiente" value="<?php echo $id_ambiente ?>">



                    <table class="table  table-striped">
                        <thead>
                            <tr>
                                <th scope="col">serial</th>
                                <th scope="col">placa</th>
                                <!-- <th scope="col">Tipo</th> -->
                                <th scope="col">marca</th>
                                <th scope="col">modelo</th>
                                <th scope="col">seleccionarlo</th>
                                <!-- <th scope="col">Cargador</th>
                                                <th scope="col">Mouse</th> -->


                            </tr>
                        </thead>
                        <tbody>


                            <?php

                            foreach ($elementos_disponibles as $Elemento) {

                            ?>

                                <tr>
                                    <td><?php echo $Elemento['id_elemento_estatico']; ?></td>
                                    <td><?php echo $Elemento['placa']; ?></td>
                                    <!-- <td><?php echo $Elemento['tipo_dispositivo'] ?></td> -->
                                    <td><?php echo $Elemento['marca'] ?></td>
                                    <td><?php echo $Elemento['modelo'] ?></td>
                                    <td><input type="checkbox" name="equipos[]" value="<?php echo $Elemento['id_elemento_estatico']; ?>"></td>
                                    <!-- <td><select name="cargador" id="" class="select-registro">
                                                            <option value="si">Si</option>
                                                            <option value="no">No</option>
                                                        </select></td>
                                                    <td></td><select name="mouse" id="" class="select-registro">
                                                        <option value="no">No</option>
                                                        <option value="si">Si</option>
                                                    </select></td> -->
                                    <!-- <td><input type="checkbox" name="cargador_<?php echo $Elemento['id_elemento_estatico'] ?>" value="si"></td>
                                                    <td><input type="checkbox" name="mouse_<?php echo $Elemento['id_elemento_estatico'] ?>" value="si"></td> -->

                                </tr>

                            <?php

                            }
                            ?>

                        </tbody>
                    </table>


                    <!-- <textarea rows="10" cols="40" name="observaciones" placeholder=""></textarea> -->



                </form>






                <?php

                if (!empty($_REQUEST['equiposSelect']) && $_REQUEST['equiposSelect'] == 'false') {
                    $mensaje = "¡no ha seleccionado elementos!";
                    echo "<script>setTimeout(function(){ alert('$mensaje'); }, 500);</script>";
                }

                if (!empty($_REQUEST['resultado'])  && $_REQUEST['resultado']=='true') {
                    $mensaje = "¡Elementos asociados correctamente!";
                    echo "<script>setTimeout(function(){ alert('$mensaje'); }, 500);</script>";
                ?>


                    <script>
                        setTimeout(function() {
                            var mensaje = "equipo <?php echo $id ?> asociado al ambiente <?php echo $serialprestamo ?>";
                            alert(mensaje);
                        }, 500);
                    </script>



                <?php
                }
                ?>


</body>

</html>