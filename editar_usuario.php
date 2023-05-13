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
          <input class="input-b btns-b" type="searc" placeholder="Buscar">
          <select class="selec-b btns-b" name="" id="">
            <option value="">Filtro</option>
          </select>
          <button class="btn-b btns-b" data-bs-toggle="modal" data-bs-target="#registrar_aprendiz">Registrar aprendiz</button>
          <button class="btn-b btns-b" data-bs-toggle="modal" data-bs-target="#registrar_instructor">Registrar instructor</button>
          <button class="btn-b btns-b" data-bs-toggle="modal" data-bs-target="#registrar_administrador">Registrar administrador</button>
        </div>
        <div class="bd-prestamo-ambientes">
        </div>
      </div>
      <div class="contenido">




      
      </div>
    </div>
  <!-- </div> -->
  <div class="barra_inferior">
  </div>


</body>



</html>