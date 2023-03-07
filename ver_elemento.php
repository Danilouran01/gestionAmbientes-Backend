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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <title>Document</title>
</head>

<body>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Serial</th>
                <th scope="col">tipo dispositivo</th>
                <th scope="col">marca</th>
                <th scope="col">modelo</th>
                <th scope="col">placa</th>
                <th scope="col">estado</th>
                <th scope="col">acciones</th>
                


            </tr>
        </thead>
        <tbody>
            
             <?php
                require_once "./classElemento.php";
                $verElemento = new Elemento();
                $result = $verElemento->mostrarElemento();
            ?>
                <?php
                while ($fila = $result->fetch_assoc()) {
                    // echo $fila['serial'] . " " . $fila['tipo_dispositivo'] . " " . $fila['marca'] . " " . $fila['modelo'] . " " . $fila['placa'] . " " . $fila['estado'] .   "<br>";
                ?>
                <tr>
                    <td><?php echo $fila['serial'] ?></td>
                    <td><?php echo $fila['tipo_dispositivo']?></td>
                    <td><?php echo $fila['marca'] ?></td>
                    <td><?php echo $fila['modelo'] ?></td>
                    <td><?php echo $fila['placa'] ?></td>
                    <td><?php echo $fila['estado']?></td>
                    <td><a class="btn btn-info bg-success" href="modificarElemento.php?serial=<?php echo $fila['serial']; ?>" style="color:white">Editar</a></td>
                    <td><a class="btn btn-info bg-success" href="eliminarElemento.php?serial=<?php echo $fila['serial']; ?>" style="color:white">Eliminar</a></td>
               </tr>
             <?php
                }
             ?>
        </tbody>
    </table>

</body>

</html>