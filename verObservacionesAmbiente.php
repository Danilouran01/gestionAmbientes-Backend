  <?php 
  require_once "./classObservacionesAmbientes.php";


  if (empty($_REQUEST['idAmbiente'])) {
  }

  $id_ambiente = $_REQUEST['idAmbiente'];

  $verObservaciones = new ObservacionesAmbientes();
  $verObservaciones->id_numero_ambiente = $id_ambiente;
  $observaciones = $verObservaciones->obtenerObservacionesDeAmbiente();

   if (!empty($_REQUEST['idObservacion'])) { 

  $id_observacion=$_REQUEST['idObservacion'];

  $verObservaciones->id_observacion=$id_observacion;
  $observaciones_id=$verObservaciones->obtenerObservacionPorId();

$color = "";
if (isset($_GET["modificado"])) {
        $color = "green";
        $texto = "Modificado";
    } else {
        $color = "red";
        $texto = "No modificado";
    }

    $modificar_observacion=true;
  }



  ?>

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
    <link rel="stylesheet" href="./Css/verDetallePrestamo.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@200&display=swap" rel="stylesheet">
    <script src="js/tooltip.js"></script>

    <title>Gestión de ambientes</title>
  </head>

  <body>

    
            <!-- MODAL NUEVA OBSERVACION -->

<?php if (!empty($modificar_observacion)) { ?>

  <div class="modal fade show" id="nueva_observacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="display: block;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Añadir observacion</h1>
          <a class="btn-registro btn-registro-ambiente" href="./verObservacionesAmbiente.php?idAmbiente=<?php echo $id_ambiente ?>"><i class="fas fa-times"></i>
</a>

        </div>
        <div class="modal-body">
          <div class="registro-div registro_usuario-input">
            <form class="registro registro_usuario" id="registro" action="./procesoModificarObservacionAmbiente.php" method="post">
              <div class="registro-input registro-usuario-input">
                <div class="rgts-input rgts-usuario-input">

                <label for="">Id prestamo</label>
    <input type="" name="idPrestamo" value="<?php echo $row['id_prestamo']; ?>" readonly> <br>

    <label for="">Responsable</label>
    <input type="" name="" value="<?php  echo $row['numero_documento']; ?>" readonly> <br>
    <label for="">Ingrese observacion</label><br>
    <textarea rows="20" cols="50" name="observaciones"  ><?php echo $row['observaciones']   ?></textarea><br>
    <input type="submit" value="añadir" name="btnObservacion">
                  <input class="campos-registro" type="hidden" value="<?php echo $id_observacion ?>" name="idObservacion">
                  <input class="campos-registro" type="hidden" value="<?php echo $id_ambiente ?>" name="idAmbiente">
                  
                  <label class="text-center" for="">Ingrese observacion</label>
                  <label class="text-center" style="color: <?php echo $color; ?>"><?php echo $texto; ?></label>
                  <?php  foreach($observaciones_id as $observacion_id){ ?>
                  <textarea rows="15" cols="50" name="observacion" placeholder=""><?php echo $observacion_id['observacion'] ?></textarea>
                  <?php } ?>
                  <input class="btn-registro btn-registro-ambiente" type="submit" value="registrar" name="modificar">
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal-backdrop fade show"></div>
  <body class="modal-open">

<?php } ?>



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




    <div class="herencia">
        <div class="buscador">
            <h3 class="titulo_herencia">Detalle prestamo Elementos</h3>
            <div class="buscador-int">

                <a class="btn-b btns-b" href="./registrarPrestamoElementos.php">Prestar Elementos</a>
                <a class="btn-b btns-b" href="./verPrestamosElementos.php">Historial</a>
                <a class="btn-b btns-b" href="./registrarPrestamoAmbiente.php">Prestar Ambiente</a>
            </div>
            <div class="bd-prestamo-ambientes">
            </div>
        </div>
        <div class="contenido">

        <div class="text-center">
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Observación</th>
          <th>Fecha</th>
          <th>Hora</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($observaciones as $observacion) { ?>
          <tr>
            <td><?php echo $observacion['id_observacion']; ?></td>
            <td>
              <spa data-bs-toggle="tooltip" data-placement="top" title="<?php echo $observacion['observacion']; ?>">
                <i class="fas fa-file"></i>
                </span>
            </td>
            <td><?php echo $observacion['fecha_observacion']; ?></td>
            <td><?php echo $observacion['hora_observacion']; ?></td>
            <td>
            <a class="btn btn-info bg-success" href="verObservacionesAmbiente.php?idObservacion=<?php echo $observacion['id_observacion']; ?>&idAmbiente=<?php  echo $id_ambiente ?>" style="color:white" onclick="return confirmacionEliminar()"><i class="fas fa-edit"></i>
            </a>
             <a class="btn btn-info bg-success" href="ProcesoEliminarObservacion.php?idObservacion=<?php echo $observacion['id_observacion']; ?>&idAmbiente=<?php echo $id_ambiente ?>" style="color:white" onclick="return confirmacionEliminar()"><i class="fas fa-trash-alt"></i>
             </a>

           

            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
</div>
    </div>
    </div>
    <!-- </div> -->
    <!-- <div class="barra_inferior">
    </div> -->
    <?php

    if (!empty($_REQUEST['idAmbiente']) && !empty($_REQUEST['observacion'])) {
      echo "<script>setTimeout(function(){ alert('Observacion agregada'); }, 500);</script>";
    }

    if (isset($_REQUEST['observacionEliminada'])) {
      if ($_REQUEST['observacionEliminada'] == true) {
        echo "<script>setTimeout(function(){ alert('Observacion eliminada'); }, 500);</script>";

      } else {
        echo "<script>setTimeout(function(){ alert('Error al eliminar observacion'); }, 500);</script>";

      }
    }
    

    ?>



  </body>

  </html>