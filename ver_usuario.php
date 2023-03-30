<?php




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
    <?php
    require_once "./classUsuario.php";

    $listarUsuario = new Usuario();
    $usuarios = $listarUsuario->listarUsuario();

    // $resultado = $listarInstructor->mostrarUsuario(2);

    ?>

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

    <!-- MODAL APRENDIZ -->

    <div class="modal fade" id="registrar_aprendiz" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Registro Aprendiz</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="registro-div registro_usuario-input">
                        <form class="registro registro_usuario" id="registro">
                            <div class="registro-input registro-usuario-input">
                                <div class="rgts-input rgts-usuario-input">
                                    <input class="campos-registro" type="text" placeholder="Nombre">
                                    <input class="campos-registro" type="text" placeholder="Apellido">
                                    <select class="campos-registro select" name="" id="" class="select-registro">
                                        <option value="" disabled selected>Tipo de documento</option>
                                        <option value="">Cedula</option>
                                        <option value="">Tarjeta de identidad</option>
                                        <option value="">Cedula de extranjeria</option>
                                        <input class="campos-registro" type="number" placeholder="Numero de documento" class="input-number">
                                        <input class="campos-registro" type="number" placeholder="Numero de ficha" class="input-number">
                                        <input class="campos-registro" type="number" placeholder="Telefono" class="input-number">
                                        <input class="campos-registro" type="email" placeholder="Correo">
                                        <button class="btn-registro btn-registro-usuario">Registrar aprendiz</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL INSTRUCTOR -->

    <div class="modal fade" id="registrar_instructor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Registro Instructor</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="registro-div registro_usuario-input">
                        <form class="registro registro_usuario" id="registro">
                            <div class="registro-input registro-usuario-input">
                                <div class="rgts-input rgts-usuario-input">
                                    <input class="campos-registro" type="text" placeholder="Nombre">
                                    <input class="campos-registro" type="text" placeholder="Apellido">
                                    <select class="campos-registro select" name="" id="" class="select-registro">
                                        <option value="" disabled selected>Tipo de documento</option>
                                        <option value="">Cedula</option>
                                        <option value="">Tarjeta de identidad</option>
                                        <option value="">Cedula de extranjeria</option>
                                        <input class="campos-registro" type="number" placeholder="Numero de documento" class="input-number">
                                        <input class="campos-registro" type="number" placeholder="Telefono" class="input-number">
                                        <input class="campos-registro" type="email" placeholder="Correo">
                                        <button class="btn-registro btn-registro-usuario">Registrar instructor</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL ADMINISTRADOR -->

    <div class="modal fade" id="registrar_administrador" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Registro administrador</h1>
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
                                        <button class="btn-registro btn-registro-usuario">Registrar administrador</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- MODAL EDITAR PERFIL -->


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




    <!-- MODAL EDITAR usuario -->


    <div class="modal fade" id="editar_usuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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



    <!-- <div class="flex"> -->
    <!-- <div class="botones-principales">
            <a href="./registrarPrestamoAmbiente.php" class="btn-1">Prestamo de ambientes</a>
            <a href="./registrarPrestamoElementos.php" class="btn-1 btn-0">Prestamo de dispositivos</a>
        </div> -->
    <div class="herencia">
        <div class="buscador">
            <h3 class="titulo_herencia">Editar usuario</h3>
            <div class="buscador-int">
                <!-- <input class="input-b btns-b" type="searc" placeholder="Buscar"> -->
                <form action="./ver_usuario.php" method="post">
                    <!-- <input class="input-b btns-b" placeholder="Buscar" type="number" id="documento" name="documento" required>
                        <input type="submit" value="Consultar" name="consultar" class="btn-consultar"> -->

                    <input class="input-b btns-b" type="text" placeholder="Buscar" name="documento">





                    <select class="selec-b btns-b" name="rol" id="">
                        <option value="0">Todos</option>
                        <option value="1">Administradores</option>
                        <option value="2">instructores</option>
                        <option value="3">Aprendiz</option>

                    </select>

                    <input type="submit" value="Consultar" name="consultar">

                </form>
                <button class="btn-b btns-b" data-bs-toggle="modal" data-bs-target="#registrar_aprendiz">Registrar aprendiz</button>
                <button class="btn-b btns-b" data-bs-toggle="modal" data-bs-target="#registrar_instructor">Registrar instructor</button>
                <button class="btn-b btns-b" data-bs-toggle="modal" data-bs-target="#registrar_administrador">Registrar administrador</button>

            </div>
            <div class="bd-prestamo-ambientes">
            </div>
        </div>
        <div class="">

            <?php
            if (isset($_REQUEST['consultar'])  || isset($_REQUEST['documento'])) {


                $busqueda = $_REQUEST['documento'];


                if ($busqueda == "") {
                    $busqueda = 0;
                }



                if (isset($_REQUEST['rol'])) {
                    $rol = $_REQUEST['rol'];
                } else {
                    $rol = 0;
                }



                echo  "rol" . $rol;

                echo "rrr" . $busqueda;

                $usuarioFiltrado = new Usuario();

                $usuarios_filtrados = $usuarioFiltrado->filtrarUsuarioIdNombreRol($busqueda, $rol);
                var_dump($usuarios_filtrados);
                //  var_dump($usuarios_filtrados);

                if ($usuarios_filtrados->num_rows < 1) {
                    echo "<h3>Usuario no encontrado</h3>";
                } else {



                    if ($usuarios_filtrados->num_rows == 1) {
            ?>




                        <?php


                        foreach ($usuarios_filtrados as $usuarios_filtrado) {

                        ?>

<center><div style=" width: 50%;"  class="col-sm-6 mx-auto">
<h3>Modificar Usuario</h3>


                                <form action="./modificarUsuario.php" method="post">





                             

                                    <label for="">Tipo documento</label>

                                    <select name="tipoDocumento" id="" class="select-registro">
                                        <option value=<?php echo $usuarios_filtrado['idDocumento']; ?>><?php echo $usuarios_filtrado['tipo'] ?> </option>
                                        <?php
                                        $resultadoSelect = $listarUsuario->obtenerTipoDocumento($usuarios_filtrado['idDocumento']);

                                        foreach ($resultadoSelect as $rows) { ?>
                                            <option value="<?php echo $rows['idDocumento']; ?>"> <?php echo $rows['tipo']; ?></option>

                                        <?php
                                        }

                                        ?>


                                    </select><br>


                                    <label for=""> N° documento</label>
                                    <input type="text" name="numeroCedula" value="<?php echo $usuarios_filtrado['numero_documento'] ?>"><br>

                                    <label for="">Nombre</label>
                                    <input type="text" name="nombre" value="<?php echo $usuarios_filtrado['nombre'] ?>"><br>

                                    <label for=""> Apellido</label>
                                    <input type="text" name="apellido" value="<?php echo $usuarios_filtrado['apellido'] ?>"> <br>
                                    <label for="">Cooreo</label>

                                    <input type="text" name="correo" value="<?php echo $usuarios_filtrado['correo']  ?>"> <br>

                                    <label for="">Telefono</label>
                                    <input type="text" name="telefono" value="<?php echo $usuarios_filtrado['telefono']  ?>"> <br>



                                    <?php if ($usuarios_filtrado['contrasena'] != null) { ?>

                                        <label for="">Contraseña</label>

                                        <input type="text" name="contrasena" value="<?php echo $usuarios_filtrado['contrasena']  ?>">


                                    <?php } ?> 
                                    
                                    
                                    
                                    
                                    <?php if ($usuarios_filtrado['numero_ficha'] != 0) { ?> 
                                        
                                        <input type="text" name="ficha" value="<?php echo $usuarios_filtrado['numero_ficha']  ?>">
                                        
                                        <?php }  ?> 
                                        
                                    
                                        <label for="">rol</label>
                                        <select name="rol" id="" class="select-registro">
                                        <option value=<?php echo $usuarios_filtrado['id_rol']; ?>>
                                        <?php echo $usuarios_filtrado['nombre_rol'] ?> </option>



                                        </select> <br>



                                        <input type="submit" class="btn btn-info bg-success" name="enviar" value="guardar" style="color:white">
                                        <a class="btn btn-info bg-success" href="eliminarUsuario.php?documento=<?php echo $usuarios_filtrado['numero_documento']; ?>" style="color:white" onclick="return confirmacionEliminar() ">Eliminar</a>






                                </form>

</div> </center><br><br>
                        


                            <?php
                        }
                            ?>





                        <?php

                    } else { ?>



                            <?php
                            ?>













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
                                                <a class="btn btn-info bg-success" href="ver_usuario.php?documento=<?php echo $usuarios_filtrado['numero_documento']; ?>" style="color:white">Editar</a>

                                                <a class="btn btn-info bg-success" href="eliminarUsuario.php?documento=<?php echo $usuarios_filtrado['numero_documento']; ?>" style="color:white" onclick="return confirmacionEliminar() ">Eliminar</a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>


                            </tbody>
                            </table>
                            </form>


                <?php
                    }
                }
            }
                ?>

                <!--   //  falta estilo -->

                <center>
                    <h3>Usuarios</h3>
                </center>


                <table class="table table-striped ">
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


                        foreach ($usuarios as $usuario) {

                        ?>
                            <tr>
                                <td class="text-center"><?php echo $usuario['tipo'] ?></td>
                                <td class="text-center"><?php echo $usuario['numero_documento'] ?></td>
                                <td class="text-center"><?php echo $usuario['nombre'] ?></td>
                                <td class="text-center"><?php echo $usuario['apellido'] ?></td>
                                <td class="text-center"><?php echo $usuario['correo']  ?></td>
                                <td class="text-center"><?php echo $usuario['telefono']  ?></td>
                                <td class="text-center"><?php echo $usuario['nombre_rol']  ?></td>
                                <td class="text-center">
                                    <a class="btn btn-info bg-success" href="ver_usuario.php?documento=<?php echo $usuario['numero_documento']; ?>" style="color:white">Editar</a>
                                    <!-- <?php echo $usuario['id_rol'] ?> -->

                                    <!-- <a  class="btn btn-info bg-success"href="#" class="btn-b btns-b" data-bs-toggle="modal" data-bs-target="#editar_usuario" data-id="<?php echo $usuario['numero_documento'];   ?>">Editar</a> -->

                                    <a class="btn btn-info bg-success" href="eliminarUsuario.php?documento=<?php echo $usuario['numero_documento']; ?>" style="color:white" onclick="return confirmacionEliminar() ">Eliminar</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>


                </tbody>
                </table>






















        </div>
    </div>
    <!-- </div> -->
    <div class="barra_inferior">
    </div>


</body>

<!-- <button class="btn-1 btn-0">Prestamo de dispositivos</button>
    <button class="btn-1" type="submit" >Prestamo de ambientes</button>
    <button class="btn-1">Registro de administrador</button> -->


</html>