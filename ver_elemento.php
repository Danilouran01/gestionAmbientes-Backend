<?php 
require_once "./classElemento.php";
$verElemento = new Elemento();
$result = $verElemento->mostrarElemento();
$consulta_tipo_dispositivo = $verElemento->tipoElemenento();
$consulta_estado_dispositivo = $verElemento->estadoElemento();




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./Css/prestamo_dispositivos.css">
    <script src="https://kit.fontawesome.com/503089e863.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./Css/global.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@200&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-xxQ3m6oi+cwAah1Rf8GxxhDRPysHxvGzpTcnAjn8nU6N1D6Gs1+p6QWU6rPnf6qqfA6i95sbl+dChW0X0NTf6Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="js/funcion.js"></script>
    <style>
        table input,
        select {
            border: none;

        }

        /* table select{
  border: none;
} */
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


        <!-- MODAL NUEVO DISPOSITVO -->

        <div class="modal fade" id="nuevo_dispositivo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir nuevo dispositivo</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="registro-div registro_usuario-input">
                            <form class="registro registro_usuario" id="registro" action="./registrarElemento.php" method="post">
                                <div class="registro-input registro-usuario-input">
                                    <div class="rgts-input rgts-usuario-input">
                                        <select class="campos-registro select" name="tipoDispositivo" id="" class="select-registro">
                                            <?php
                                            foreach ($consulta_tipo_dispositivo as $row) { ?>


                                                <option value="<?php echo $row['id_tipo_dispositivo']   ?>"><?php echo $row['tipo_dispositivo']   ?></option>

                                            <?php

                                            }
                                            ?>
                                        </select>
                                        <input class="campos-registro" type="text" placeholder="Serial" name="serial" required>
                                        <input class="campos-registro" type="text" placeholder="Marca" name="marca" required>
                                        <input class="campos-registro" type="text" placeholder="Modelo" class="input-number" name="modelo" required>
                                        <input class="campos-registro" type="text" placeholder="PLaca" class="input-number" name="placa">

                                        <select class="campos-registro select" name="estado" id="" class="select-registro">
                                            <?php
                                            foreach ($consulta_estado_dispositivo as $estado) { ?>


                                                <option value="<?php echo $estado['id_estado_elemento']   ?>"><?php echo $estado['estado_elemento']   ?></option>

                                            <?php

                                            }
                                            ?>

                                        </select>

                                        <input class="btn-registro btn-registro-usuario" type="submit" value="Registrar dispositivo" name="registrarElemento">


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
    <!-- <div class="botones-principales">
            <a href="./registrarPrestamoAmbiente.php" class="btn-1">Prestamo de ambientes</a>
            <a href="./prestamo_dispositivos.php" class="btn-1 btn-0">Prestamo de dispositivos</a>
        </div> -->
    <div class="herencia">
        <div class="buscador">
            <h3 class="titulo_herencia">Prestamo de ambientes</h3>
            <div class="buscador-int">
                <!-- <input class="input-b btns-b" type="searc" placeholder="Buscar"> -->
                <form action="./ver_elemento.php" method="post">
                    <input class="input-b btns-b" placeholder="Buscar" type="text" id="" name="serial" required>
                    <input type="submit" value="Consultar" name="consultar" class="btn-consultar">
                </form>



                <!-- <select class="selec-b btns-b" name="" id="">
                    <option value="">Filtro</option>
                </select> -->
                <button class="btn-activos" data-bs-toggle="modal" data-bs-target="#nuevo_dispositivo">Añadir dispositivo</button>
                <!-- <a href="./ver_elemento.php" class="btn-activos">Elementos </a> -->
                <a href="./registrarPrestamoAmbiente.php" class="btn-activos">Prestamo de ambientes</a>
                <a href="./registrarPrestamoElementos.php" class="btn-activos">Prestamo de dispositivos</a>


            </div>
            <div class="bd-prestamo-ambientes">
            </div>
        </div>
        <div class="contenido-ml">
            <center><a href="./verElementosEstaticos.php" class="btn-b btns-b">Elementos estaticos</a>
                <a href="./ver_elemento.php" class="btn-b btns-b">Elementos oficina</a>
            </center>

            <form action=".//excelElementosOficina.php" method="post" enctype="multipart/form-data">
                <label for="archivo_excel">Seleccione el archivo Excel:</label>
                <input type="file" name="archivo_excel" id="archivo_excel" accept=".xlsx,.xls">

                <input type="submit" name="submit" value="Procesar">
            </form>


            <?php



            if (isset($_REQUEST['serial']) || isset($_REQUEST['consultar'])) {
                $id_elemento = $_REQUEST['serial'];

                require_once "./classElemento.php";
                $verElementoId = new Elemento();
                $elementos = $verElementoId->obtenerElementoPorSerial($id_elemento);

                if ($elementos->num_rows < 1) {  ?>
                    <script>
                        setTimeout(function() {
                            var mensaje = "Elemento no encontrado "
                            alert(mensaje);
                        }, 300);
                    </script>
                <?php
                } else {




                ?>

                    <form action="./modificarElemento.php" method="post">
                        <center>
                            <h5>Dar click sobre el recuadro que desea modifcar y posteriormente presione guardar</h5>
                        </center>


                        <table class="table ">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">Serial</th>
                                    <th scope="col" class="text-center" >tipo dispositivo</th>
                                    <th scope="col" class="text-center">marca</th>
                                    <th scope="col" class="text-center">modelo</th>
                                    <th scope="col" class="text-center">placa</th>
                                    <th scope="col" class="text-center">estado</th>
                                    <th scope="col" class="text-center">acciones</th>
 


                                </tr>
                            </thead>
                            <tbody>




                                <?php
                                foreach ($elementos as $fila) {

                                    // $dis=$fila['tipo_dispositivo'];
                                    // echo $fila['serial'] . " " . $fila['tipo_dispositivo'] . " " . $fila['marca'] . " " . $fila['modelo'] . " " . $fila['placa'] . " " . $fila['estado'] .   "<br>";
                                ?>
                                    <tr>

                                        <td class="text-center"><input class="text-center" type="text" value="<?php echo $fila['serial'] ?>" name="serial" readonly></td>


                                        <td class="text-center" >
                                        <select name="tipoDispositivo" id="">
                                                <option value="<?php echo $fila['id_tipo_dispositivo'] ?>"><?php echo $fila['tipo_dispositivo'] ?> </option>

                                                <?php
                                                $tipo_dispositivos = $verElemento->tipoDispositivoDiferenteAlActual($fila['id_tipo_dispositivo']);
                                                var_dump($tipo_dispositivos);
                                                foreach ($tipo_dispositivos as $tipo_dispositivo) { ?>
                                                    <option value="<?php echo $tipo_dispositivo['id_tipo_dispositivo'] ?>"><?php echo $tipo_dispositivo['tipo_dispositivo'] ?></option>

                                                <?php  # code...
                                                } ?>

                                            </select></td>

                                        <td><input class="text-center" type="text" value="<?php echo $fila['marca'] ?>" name="marca"></td>



                                

                                        <td class="text-center"><input class="text-center" type="text" value="<?php echo $fila['modelo'] ?>" name="modelo"></td>
                                        <?php if ($fila['placa'] == NULL) { ?>

                                            <td class="text-center"><input class="text-center" type="text" value="<?php echo "sin placa"; ?>" name="placa"></td>
                                        <?php   # code...
                                        } else { ?>
                                            <td class="text-center"><input class="text-center"  type="text" value="<?php echo $fila['placa'] ?>" name="placa"></td>
                                        <?php   # code...
                                        } ?>
                                        <td class="text-center"><select class="text-center" name="estado" id="">
                                                <option value="<?php echo $fila['id_estado_elemento']   ?>"><?php echo $fila['estado_elemento']   ?></option>
                                                <?php
                                                $estado_dispositivos = $verElemento->estadoDispositivoDiferenteAlActual($fila['id_estado_elemento']);
                                                var_dump($estado_dispositivos);
                                                foreach ($estado_dispositivos as $estado_dispositivo) { ?>
                                                    <option value="<?php echo $estado_dispositivo['id_estado_elemento'] ?>"><?php echo $estado_dispositivo['estado_elemento'] ?></option>



                                                <?php  # code...
                                                } ?>

                                            </select></td>
                                        <!-- <td><a href="modificarElemento.php?serial=<?php echo $fila['serial']; ?>" style="color:white">Editar</a> -->
                                        <td class="text-center"><input class="btn btn-info bg-success" type="submit" name="enviarElemnto" value="Guardar " style="color:white">

                                            <a class="btn btn-info bg-success" href="eliminarElemento.php?serial=<?php echo $fila['serial']; ?>" style="color:white" onclick="return confirmacionEliminar()">Eliminar</a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>


                    </form>


            <?php

                }
            }
            ?>

            <center>
                <h3>Elementos</h3>
            </center>


            <table class=" table table-striped">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">Serial</th>
                        <th scope="col"  class="text-center">tipo dispositivo</th>
                        <th scope="col"  class="text-center">marca</th>
                        <th scope="col"  class="text-center">modelo</th>
                        <!-- <th scope="col">placa</th> -->
                        <th scope="col"  class="text-center">estado</th>
                        <th scope="col"  class="text-center">acciones</th>



                    </tr>
                </thead>
                <tbody>

                    <?php

                    ?>
                    <?php
                    while ($fila = $result->fetch_assoc()) {
                        // echo $fila['serial'] . " " . $fila['tipo_dispositivo'] . " " . $fila['marca'] . " " . $fila['modelo'] . " " . $fila['placa'] . " " . $fila['estado'] .   "<br>";
                    ?>
                        <tr>
                            <td  class="text-center"><?php echo $fila['serial'] ?></td>
                            <td  class="text-center"><?php echo $fila['tipo_dispositivo'] ?></td>
                            <td  class="text-center"><?php echo $fila['marca'] ?></td>
                            <td  class="text-center"><?php echo $fila['modelo'] ?></td>
                            <!-- <td><?php echo $fila['placa'] ?></td> -->
                            <td  class="text-center"><?php echo $fila['estado_elemento'] ?></td>
                            <td  class="text-center"><a class="btn btn-info bg-success" href="ver_elemento.php?serial=<?php echo $fila['serial']; ?>" style="color:white">Editar</a>
                                <a class="btn btn-info bg-success" href="eliminarElemento.php?serial=<?php echo $fila['serial']; ?>" style="color:white" onclick="return confirmacionEliminar() ">Eliminar </a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>



        </div>
    </div>
    <!-- </div> -->
    <div class="barra_inferior">


    </div>


    
    <?php
if(isset($_REQUEST['registro'])) {
    $serialprestamo = $_REQUEST['registro']; ?>

    <script>
        setTimeout(function() {
            var mensaje = "datos registrados exitosamente";
            alert(mensaje);
        }, 500);
    </script> 
<?php }
if(isset($_REQUEST['registroFallido'])) {
    $serialprestamo = $_REQUEST['registroFallido']; ?>

    <script>
        setTimeout(function() {
            var mensaje = "por favor cargue un documento de excel";
            alert(mensaje);
        }, 500);
    </script> 
<?php }

if(isset($_REQUEST['idElemento'])) {
    $idElemento = $_REQUEST['idElemento']; ?>

    <script>
        setTimeout(function() {
            var mensaje = "Elemento <?php echo $idElemento ?> registrado exitosamente";
            alert(mensaje);
        }, 500);
    </script> 
<?php } 




if (isset($_REQUEST['serialElemento'])) {
    $serial_elemento = $_REQUEST['serialElemento']; ?>

    <script>
        setTimeout(function() {
            var mensaje = "Elemento <?php echo $serial_elemento ?> eliminado con exito. ";
            alert(mensaje);
        }, 500);
    </script>

 <?php } 


?>
</body>

</html>