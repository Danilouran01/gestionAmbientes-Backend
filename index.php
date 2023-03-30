<?php
require_once "./classUsuario.php";

$usuarioIndex = new Usuario();
$documento_aprendiz = $usuarioIndex->mostrarTipoDocumentoSelect();
$documento_instructor = $usuarioIndex->mostrarTipoDocumentoSelect();

if (isset($_GET['msg'])) {
    $Message = $_GET['msg'];
} else {
    $Message = 0;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Css/style.css">
    <link rel="stylesheet" href="./css/global.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@200&display=swap" rel="stylesheet">

    <title>Gestion de Ambientes</title>
</head>
<?php
if ($Message == 1) { ?>
    <script>
        Swal.fire(
            'Algo salió mal',
            'Numero de documento o contraseña incorrectos',
            'error'
        )
    </script>
<?php } ?>

<?php
if ($Message == 2) { ?>
    <script>
        Swal.fire(
            'Muy Bien',
            'El link para cambiar la contraseña se acaba de enviar a tu correo electronico, Revise por favor',
            'success'
        )
    </script>
<?php } ?>

<?php
if ($Message == 3) { ?>
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Contraseña Actualizada ',
            showConfirmButton: false,
            timer: 2500
        })
    </script>
<?php } ?>

<?php
if ($Message == 4) { ?>
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Instructor agregado correctamente',
            showConfirmButton: false,
            timer: 2500
        })
    </script>
<?php } ?>

<?php
if ($Message == 5) { ?>
    <script>
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Invitado agregado correctamente',
            showConfirmButton: false,
            timer: 2500
        })
    </script>
<?php } ?>

<body>

    <div class="barra_superior">
        <img class="logo" src="./images/logo sena.png" alt="">
        <h1 class="titulo_principal">Gestion de Ambientes</h1>
    </div>

    <div class="subtitulo">
        <h2>Selecciona tu rol</h2>
    </div>



    <div class="roles">
        <div class="administrador div_rol">
            <a href="" class="btn_rol" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#inicio_sesion">
                <img class="img_rol" src="./images/Boton Administrador.png" alt="">
            </a>
            <h3>Administrador</h3>
        </div>
        <div class="instructor div_rol">
            <a href="#" class="btn_rol" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registrar_instructor">
                <img class="img_rol" src="./images/Boton Intructor.png" alt="">
            </a>
            <h3>Instructor</h3>
        </div>
        <div class="aprendiz div_rol" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registrar_aprendiz">
            <a href="#" class="btn_rol">
                <img class="img_rol" src="./images/Boton Aprendiz.png" alt="">
            </a>
            <h3>Invitado</h3>
        </div>
    </div>



        <!-- MODAL INICIO DE SESION -->



    <div class="modal fade" id="inicio_sesion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Iniciar Sesión</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="registro-div">
                        <form action="login/logear.php" method="POST" class="registro registro-admin" id="registro">
                            <div class="registro-input">
                                <div class="rgts-input">
                                    <input class="campos-registro" name="numero_documento" id="numero_documento" type="number" placeholder="Numero de documento" class="input-number" required>
                                    <input class="campos-registro" name="contrasena" id="contrasena" type="password" placeholder="Contraseña" required>

                                    <button class="btn-registro">Iniciar Sesión</button>
                                    <a href="Recuperar_password/request_Reset.php">¿Olvidaste la contraseña?</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <!-- MODAL REGISTRO INSTRUCTOR -->


    <div class="modal fade" id="registrar_instructor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Registro Instructor</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="registro-div registro_usuario-input">
                        <form class="registro registro_usuario" id="registro" method="post" action="./registrarInstructor.php">
                            <div class="registro-input registro-usuario-input">
                                <div class="rgts-input rgts-usuario-input">

                                    <select class="campos-registro" name="tipoDocumento" id="" class="select-registro">

                                        <?php

                                        while ($rows = $documento_instructor->fetch_assoc()) { ?>

                                            <option value="<?php echo $rows['idDocumento'] ?>"><?php echo $rows['tipo']  ?></option>

                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <input class="campos-registro" type="number" placeholder="Numero de documento" class="input-number" name="numeroCedula">
                                    <input class="campos-registro" type="text" placeholder="Nombre" name="nombre">
                                    <input class="campos-registro" type="text" placeholder="Apellido" name="apellido">
                                    <input class="campos-registro" type="number" placeholder="Telefono" class="input-number" name="telefono">
                                    <input class="campos-registro" type="email" placeholder="Correo" name="correo">
                                    <input class="btn-registro btn-registro-usuario" type="submit" value="Registrarse" name="enviar">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <!-- MODAL REGISTRO APRENDIZ -->


    <div class="modal fade" id="registrar_aprendiz" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Registro invitado</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="registro-div registro_usuario-input">
                        <form class="registro registro_usuario" id="registro" method="post" action="./registrarInvitado.php">
                            <div class="registro-input registro-usuario-input">
                                <div class="rgts-input rgts-usuario-input">

                                    <select class="campos-registro" name="tipoDocumento" id="" class="select-registro">

                                        <?php

                                        while ($row = $documento_aprendiz->fetch_assoc()) { ?>

                                            <option value="<?php echo $row['idDocumento'] ?>"><?php echo $row['tipo']  ?></option>

                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <input class="campos-registro" type="number" placeholder="Numero de documento" class="input-number" name="numeroCedula">

                                    <input class="campos-registro" type="text" placeholder="Nombre" name="nombre">
                                    <input class="campos-registro" type="text" placeholder="Apellido" name="apellido">


                                    <input class="campos-registro" type="text" placeholder="Centro" class="input-number" name="centro">
                                    <input class="campos-registro" type="number" placeholder="Telefono" class="input-number" name="telefono">
                                    <input class="campos-registro" type="email" placeholder="Correo" name="correo">


                                    <input class="btn-registro btn-registro-usuario" type="submit" value="Registrarse" name="enviar">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>









    <div class="barra_inferior">

    </div>


</body>

<!-- colores #238276 -->

</html>