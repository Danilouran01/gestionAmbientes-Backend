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

    <link rel="shortcut icon" href="images/logo1.png" type="image/x-icon">
    <!--Todo lo de boostrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../style.css">
    <style>
        .fakeimg {
            height: 200px;
            background: #aaa;
        }
    </style>
    <title>Modificar ambiente </title>
    <!--Fin boostrap -->
</head>

<body>


    <?php

require_once "./classAmbientes.php";

    $idAmbiente = $_REQUEST['idAmbiente'];
    echo $idAmbiente;

   
    $verAmbienteId = new Ambientes();
    $resultado = $verAmbienteId->obtenerAmbientePorId($idAmbiente);
    $row = $resultado->fetch_assoc();

    ?>
         <div class="registro-div registro-ambiente-div">
        <form class="registro registro-ambiente" id="registro" action="./modificarAmbientes.php" method="post">
            <h3>modificar de ambiente</h3>
            <div class="registro-input registro-ambiente-input">
                <div class="rgts-input rgts-ambiente-input">

                    <input type="text" name="numeroAmbiente" placeholder="numero abiemte" value=<?php echo $row['id_numero_ambiente'] ?> >
                    <input type="text" name="numeroPiso" placeholder="numero piso" value=<?php echo $row['piso'] ?>>
                    
                    <select name="estadoAmbiente" class="select-registro">
                    <?php
                        include "../conexion.php";
                        $sql = "SELECT id_estado_ambiente,estado_ambiente from estado_ambiente ";
                        $resultadoSql = mysqli_query($mysqli, $sql);
                        if ($resultadoSql) {

                            
                            while($row = $resultadoSql->fetch_assoc()){

                        ?>
                                <option value="<?php echo $row['id_estado_ambiente']; ?>"> <?php echo $row['estado_ambiente']; ?></option>

                        <?php

}   
                        } else {
                            echo "erro: " . mysqli_error($mysqli);
                        }
                        ?>
                    </select>
                    <!-- <input type="text" name="elementoAmbiente" placeholder="elemento ambiente"> -->
                    <input class="btn-registro btn-registro-ambiente" type="submit" value="modificar" name="modificar">
                </div>
            </div>
        </form>
    </div>

    <?php
    require_once "./classAmbientes.php";

    if (isset($_POST['modificar']) && !empty($_POST['modificar'])) {
        $idDelAmbiente=$_POST['numeroAmbiente'];
        $piso=$_POST['numeroPiso'];
        $resultado=$_POST['estadoAmbiente'];

        $modificarAmbiente = new Ambientes();
        $modificarAmbiente->id_ambiente=$idDelAmbiente;
        $modificarAmbiente->piso=$piso;
        $modificarAmbiente->estado=$resultado;
      
        $modificarAmbiente->modificarAmbiente();
    }
    ?>



</body>

</html>