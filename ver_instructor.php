 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <title>Document</title>
 </head>
 <body>

 <table >
  <thead>
    <tr>
      <th scope="col">Tipo documento</th>
      <th scope="col">N° documento</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Correo</th>
      <th scope="col">Telefono</th>
      <th scope="col">Rol</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>

  <?php 
  require_once "./classInstructor.php";

  $listarInstructor=new Instructor();
  $resultado=$listarInstructor->mostrarUsuario(2);
  
  while($row = $resultado->fetch_assoc()){

    ?>
    <tr>
     <td><?php echo $row['tipo']?></td>
     <td><?php echo $row['numero_documento']?></td>
     <td><?php echo $row['nombre']?></td>
     <td><?php echo $row['apellido']?></td>
     <td><?php echo $row['correo']  ?></td>
     <td><?php echo $row['telefono']  ?></td>
     <td><?php echo $row['nombre_rol']  ?></td>
     <td><a class="btn btn-info bg-success" href="modifcarInstructor.php?documento=<?php echo $row['numero_documento'];?>" style="color:white">Editar</a></td>
     <td><a class="btn btn-info bg-success" href="eliminarAprendiz.php?documento=<?php echo $row['numero_documento'];?>" style="color:white">Eliminar</a></td>
    </tr>
<?php
  }
?> 
  </tbody>
</table>


  </tbody>
</table>
 </body>
 </html>