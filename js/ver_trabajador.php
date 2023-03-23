<?php session_start();
if ($_SESSION['usuario']) {

?>

  <!DOCTYPE html>
  <html lang="es">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Todo lo de boostrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="js/funciones.js"></script>


    <link rel="shortcut icon" href="images/logo1.png" type="image/x-icon">



    <style>
      .fakeimg {
        height: 200px;
        background: #aaa;
      }
    </style>

    <title>Lista de trabajadores</title>
  </head>

  <body>
    <?php
    require("navar.php");

    ?>

    <!-- <a href="salir.php" class="btn btn-success" style="float: right;">Salir</a> -->

    <form action="ver_trabajador.php" method="get">
      <center>
      <input type="text" name="busqueda" placeholder="Ingrese la cédula ">
      <input type="submit" name="buscar" value="Buscar">
      </center>
    </form>
    <br>

    <?php


    if (isset($_GET['buscar'])) {
      $buscar = $_GET['busqueda'];

      require("conexion.php");
      $query = "SELECT * FROM tbltrabajador WHERE idtrabajador=$buscar ";
      $resultado = mysqli_query($conexion, $query);

      if ($resultado) {
        $rowcount = mysqli_num_rows($resultado);
        // echo "The total number of rows are: " . $rowcount;
        if ($rowcount >= 1) {


    ?>

          <table class="table table-striped table-dark" >

            <thead>
              <tr>
                <th class="text-center">Número de cédula</th>
                <th class="text-center">Nombre</th>
                <th class="text-center">Teléfono</th>
                <th class="text-center">Acciones</th>
              </tr>

            </thead>
            <tbody>

              <?php

              while ($row = $resultado->fetch_assoc()) {
              ?>
                <tr>
                  <td class="text-center"><?php echo $row['idtrabajador']; ?></td>
                  <td class="text-center"><?php echo $row['nombre']; ?></td>
                  <td class="text-center"><?php echo $row['telefono']; ?></td>
                  <td class="text-center">
                    <a class="btn btn-info" href="modificar_trabajador.php?cedula=<?php echo $row['idtrabajador']; ?>" onclick="return confirmacionModificar()">Editar</a>
                    <a class="btn btn-info" href="proceso_eliminar_trabajador.php?cedula=<?php echo $row['idtrabajador']; ?>" onclick="return confirmacionEliminar()">Eliminar</a>
                    <a class="btn btn-info" href="ver_trabajador.php">Limpiar</a>
                  </td>
                </tr>

        <?php
              }
            }
          }
        } else
          //  echo"<br>Datos incorrectos";


        ?>

            </tbody>
          </table>



          <!----------------------------------------------------------------------------------------------------->
          <div class="container w-75 bg-amber mt-5 rounded shadow">
          

          <h2 class="text-center" style="color:black;">Listado de usuarios</h2>
          <div class="container w-80 bg-amber mt-5 rounded shadow">
     
          <table class="table table-hover table-sm">
            <thead>
              <tr>
                <th class="text-center">Número cédula</th>
                <th class="text-center">Nombre</th>
                <th class="text-center">Teléfono</th>
                <th class="text-center">Acciones</th>
              </tr>

            </thead>
            <tbody>
              <?php
            require("conexion.php");
            $query = "SELECT * FROM tbltrabajador";
            $resultado = mysqli_query($conexion, $query);
            if ($resultado) {
              // echo"la consula fhncion";

              while ($row = $resultado->fetch_assoc()) {
              ?>
                  <tr>
                    <td class="text-center"><?php echo $row['idtrabajador']; ?></td>
                    <td class="text-center"><?php echo $row['nombre']; ?></td>
                    <td class="text-center"><?php echo $row['telefono']; ?></td>

                    <td class="text-center">
                      <a class="btn btn-info bg-success" href="modificar_trabajador.php?cedula=<?php echo $row['idtrabajador']; ?>" onclick="return confirmacionModificar()" style="color:white">Editar</a>
                      <a class="btn btn-info bg-success" href="proceso_eliminar_trabajador.php?cedula=<?php echo $row['idtrabajador']; ?>" onclick="return confirmacionEliminar()" style="color:white">Eliminar</a>
                    </td>


                  </tr>

              <?php
              }
            }

              ?>

            </tbody>
          </table>
          
          
          </div><br><br>
          </div>
          <div class="mt-3 p-2  text-white text-center" style="background:green
 ;">
            <p> © 2022 Copyright:</p>
          </div>
  </body>

  </html>

<?php
} else {
  header("location:index.php");
} ?>