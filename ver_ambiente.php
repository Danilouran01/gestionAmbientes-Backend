<?php 
require_once "./classAmbientes.php";
$verAmbiente = new Ambientes();
$actualizarEstadoAmbiente = new Ambientes();




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
    <script src="./js/funcion.js"></script>

    <style>

table input,select {
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



    </div>


    <!-- <div class="flex">
        <div class="botones-principales">
            <a href="./registrarPrestamoAmbiente.php" class="btn-1">Prestamo de ambientes</a>
            <a href="./registrarPrestamoElementos.php" class="btn-1 btn-0">Prestamo de dispositivos</a>
        </div> -->
        <div class="herencia">
            <div class="buscador">
                <h3 class="titulo_herencia">Historial</h3>
                <div class="buscador-int">
                    <!-- <input class="input-b btns-b" type="searc" placeholder="Buscar"> -->
                    <form action="./ver_ambiente.php" method="post">
                        <input class="input-b btns-b" placeholder="Buscar" type="number" id="id_ambiente" name="id_ambiente" required>
                        <input type="submit" value="Consultar" name="consultar" class="btn-consultar">
                    </form>



                    <!-- <select class="selec-b btns-b" name="" id="">
                        <option value="">Filtro</option>
                    </select> -->

                    <button class="btn-b btns-b" data-bs-toggle="modal" data-bs-target="#nuevo_ambiente">Añadir ambiente</button>

                    <a href="./registrarPrestamoAmbiente.php" class="btn-activos">Prestar ambientes </a>
                    <a href="#" class="btn-activos">Generar reporte </a>
                    


                </div>
                <div class="bd-prestamo-ambientes">
                </div>
            </div>
            <div class="contenido">

                

            <?php



if (isset($_REQUEST['id_ambiente']) || isset($_REQUEST['consultar'])) {
    $id_ambiente = $_REQUEST['id_ambiente'];

    require_once "./classAmbientes.php";
    $mostrarAmbiente= new Ambientes();
    $ambientes = $mostrarAmbiente->obtenerAmbientePorId($id_ambiente);
    

    if ($ambientes->num_rows < 1) {  ?>
        <script>
     setTimeout(function() {
         var mensaje = "ambiente no encontrado "
         alert(mensaje);
     }, 300);
 </script>
  <?php   
 } else { 




?>

    <form action="./modificarAmbientes.php" method="post">

        
        
    <?php
                foreach ($ambientes as $ambiente_id) {

                    // $dis=$fila['tipo_dispositivo'];
                    // echo $fila['serial'] . " " . $fila['tipo_dispositivo'] . " " . $fila['marca'] . " " . $fila['modelo'] . " " . $fila['placa'] . " " . $fila['estado'] .   "<br>";
            ?>
<!-- //     <td><input class="btn btn-info bg-success" type="submit" name="enviarElemnto" value="Guardar Modificacion" style="color:white">

// <a class="btn btn-info bg-success" href="eliminarElemento.php?serial=<?php echo $fila['serial']; ?>" style="color:white" onclick="return confirmacionEliminar()">Eliminar</a> -->
</td>
        <table class="table ">
            <thead>
                <tr>
                    <th scope="col">ambiente</th>
                    <th scope="col">piso</th>
                    <th scope="col">linea formacion</th>
                    <th scope="col">sillas</th>
                    <th scope="col">estado</th>
                    <th scope="col">acciones</th>

                </tr>
            </thead>
            <tbody>




                    <tr>

                        <td><input type="text" value="<?php echo $ambiente_id['id_numero_ambiente'] ?>" name="numeroAmbiente" readonly></td>

                      



                        <td><input type="text" value="<?php echo $ambiente_id['piso'] ?>" name="numeroPiso"></td>
                        <td> <select class="" name="lineaFormacion" id="" class="select-registro">
                                            <?php
                                            $lineas_formacion = $verAmbiente->mostrarLineaFormacion();;
                                            foreach ($lineas_formacion as $linea_formacion) {

                                            ?>
                                                <option value="<?php echo $linea_formacion['id_linea']; ?>"> <?php echo $linea_formacion['nombre_linea']; ?></option>

                                            <?php

                                            }

                                            ?>

                                        </select>
                                        </td>
                            <td><input type="text" value="<?php echo $ambiente_id['cantidad_sillas'] ?>" name="cantSillas"></td>


                        <td><select name="estadoAmbiente" id="">
                                <option value="<?php echo $ambiente_id['id_estado_ambiente'] ?>"><?php echo $ambiente_id['estado_ambiente'] ?> </option>  

                                <?php
                                $estado_ambientes = $mostrarAmbiente->estadoAmbienteDiferenteActual($ambiente_id['id_estado_ambiente']);
                                var_dump($estado_ambientes);
                                foreach ($estado_ambientes as $estado_ambiente) { ?>
                                <option value="<?php echo $estado_ambiente['id_estado_ambiente'] ?>"><?php echo $estado_ambiente['estado_ambiente'] ?> </option>  



                                <?php  # code...
                                } ?>
                            </select></td>
                      
                        <!-- <td><a href="modificarElemento.php?serial=<?php echo $fila['serial']; ?>" style="color:white">Editar</a> -->
                        <td><input class="btn btn-info bg-success" type="submit" name="modificar" value="Guardar Modificacion" style="color:white">

                            <a class="btn btn-info bg-success" href="eliminarElemento.php?serial=<?php echo $fila['serial']; ?>" style="color:white" onclick="return confirmacionEliminar()">Eliminar</a>
                            

                            <a class="btn btn-info bg-success" href="verInformacionAmbiente.php?idAmbiente=<?php echo $fila['serial']; ?>" style="color:white">informacion</a>

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



                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">numero</th>
                            <th scope="col">piso</th>
                            <th scope="col">Linea formacion</th>
                            <th scope="col">estado</th>
                            <th scope="col">acciones</th>




                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        require_once "./classAmbientes.php";
                        $verAmbiente = new Ambientes();
                        $resultado = $verAmbiente->mostrarAmbiente();
                        ?>
                        <?php
                        while ($filas = $resultado->fetch_assoc()) {

                        ?>
                            <tr>
                                <td><?php echo $filas['id_numero_ambiente']; ?></td>
                                <td><?php echo $filas['piso']; ?></td>
                                <td><?php echo $filas['nombre_linea']; ?></td>
                                <td><?php echo $filas['estado_ambiente'] ?></td>

                                <?php

                                // if ($filas['id_estado_ambiente'] == 1) { ?>
                                    <td><a class="btn btn-info bg-success" href="ver_ambiente.php?id_ambiente=<?php echo $filas['id_numero_ambiente']; ?>" style="color:white">Editar</a>
                                    <a class="btn btn-info bg-success" href="eliminarAmbiente.php?idAmbiente=<?php echo $filas['id_numero_ambiente']; ?>" style="color:white" onclick="return confirmacionEliminar() ">Eliminar</a>

                                    <a class="btn btn-info bg-success" href="verInformacionAmbiente.php?idAmbiente=<?php echo $filas['id_numero_ambiente']; ?>" style="color:white">informacion</a>
                                    <a class="btn btn-info bg-success" href="asociarAmbienteElemento.php?idAmbiente=<?php echo $filas['id_numero_ambiente']; ?>" style="color:white"> + Elementos</a>


                                    
                                <?php
                                // } //else { ?>

                                    <!-- <td><a class="btn btn-info bg-success" href="ver_ambiente.php?id_ambiente=<?php echo $filas['id_numero_ambiente']; ?>" style="color:white">Editar</a>
                                    <a class="btn btn-info bg-success" href="eliminarAmbiente.php?idAmbiente=<?php echo $filas['id_numero_ambiente']; ?>" style="color:white" onclick="return confirmacionEliminar() " >Eliminar</a>
                                    <a class="btn btn-info bg-success" href="verInformacionAmbiente.php?serial=<?php echo $filas['serial']; ?>" style="color:white">informacion</a></td> -->
                                    



                                <?php
                                // }




                                ?>
                            </tr>
                        <?php
                        }

                        ?>
                    </tbody>
                </table>


            </div>
        </div>
    </div>
    <div class="barra_inferior">
    </div>

</body>

</html>