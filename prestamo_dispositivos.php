<?php
session_start();
if(!isset($_SESSION['numero_documento'])){
    header("location: index.php");
};
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
    </div>


    <div class="flex">
        <div class="botones-principales">
            <a href="./registrarPrestamoAmbiente.php" class="btn-1" >Prestamo de ambientes</a>
            <a href="./prestamo_dispositivos.php"class="btn-1 btn-0">Prestamo de dispositivos</a>
        </div>
        <div class="herencia">
            <div class="buscador">
                <h3 class="titulo_herencia">Prestamo de dispositivos</h3>
                <div class="buscador-int">
                    <input class="input-b btns-b" type="searc" placeholder="Buscar">
                    <select class="selec-b btns-b" name="" id=""><option value="">Filtro</option></select>
                    <button class="btn-b btns-b" data-bs-toggle="modal" data-bs-target="#nuevo_dispositivo">Añadir dispositivo</button>
                </div> 
                <div class="bd-prestamo-ambientes">
                </div>
            </div>
            <div class="contenido">
                <p></p>
            </div>
        </div>
    </div>
    <div class="barra_inferior">
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
                    <form class="registro registro_usuario" id="registro">
                        <div class="registro-input registro-usuario-input">
                            <div class="rgts-input rgts-usuario-input">
                                <select class="campos-registro select" name="" id="" class="select-registro">
                                    <option value="" disabled selected>Tipo de dispositivo</option>
                                    <option value="">Portatil</option>
                                    <option value="">video beam</option>
                                <input class="campos-registro" type="text" placeholder="Serial">
                                <input class="campos-registro" type="text" placeholder="Marca">
                                <input class="campos-registro" type="text" placeholder="Modelo" class="input-number">
                                <select class="campos-registro select" name="" id="" class="select-registro">
                                    <option value="" disabled selected>Estado del dispositivo</option>
                                    <option value="">Disponible</option>
                                    <option value="">En mantenimiento</option>
                                <input class="campos-registro" type="text" placeholder="PLaca" class="input-number">
                                <button class="btn-registro btn-registro-usuario">Registrar dispositivo</button>
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
    
     
</body>

    <!-- <button class="btn-1 btn-0">Prestamo de dispositivos</button>
    <button class="btn-1" type="submit" >Prestamo de ambientes</button>
    <button class="btn-1">Registro de administrador</button> -->


</html>