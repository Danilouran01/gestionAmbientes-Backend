<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>Gestion de Ambientes</title>
    <link rel="stylesheet" href="../Css/global.css">

</head>
<body>

    <div class="barra_superior">
        <img class="logo" src="../images/logo sena.png" alt="">
        <h1 class="titulo_principal">Gestion de Ambientes</h1>

    </div>

    <div class="subtitulo">
        <h2>Selecciona tu rol</h2>
    </div>



    <div class="roles">
        <div class="administrador div_rol">
            <a href="" class="btn_rol" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <img class="img_rol" src="../images/Boton Administrador.png" alt="">
            </a>
            <h3>Administrador</h3>
        </div>
        <div class="instructor div_rol">
            <a href="#" class="btn_rol" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                <img class="img_rol" src="../images/Boton Intructor.png" alt="">
            </a>
            <h3>Instructor</h3>
        </div>
        <div class="aprendiz div_rol" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal3">
            <a href="#" class="btn_rol">
                <img class="img_rol" src="../images/Boton Aprendiz.png" alt="">
            </a>
            <h3>Aprendiz</h3>
        </div>
    </div>

    

  
        <!-- Modal 1  -->

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Iniciar Sesión</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="registro-div">
                <form class="registro registro-admin" id="registro">
                    <div class="registro-input">
                        <div class="rgts-input">
                            <input class="campos-registro" type="number" placeholder="Numero de documento" class="input-number">
                            <input class="campos-registro" type="password" placeholder="Contraseña">

                            <button class="btn-registro">Iniciar Sesión</button>
                            <a href="#">¿Olvidaste la contraseña?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>

        <!-- MODAL 2 -->

  <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <button class="btn-registro btn-registro-usuario">Registrarse</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>


        <!-- MODAL 3 -->

  <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <button class="btn-registro btn-registro-usuario">Registrarse</button>
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