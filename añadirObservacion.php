<?php
include_once "./classPrestamo.php";

session_start();
if(!isset($_SESSION['numero_documento'])){
    header("location: index.php");
};
 
$id_prestamo=$_REQUEST['idprestamo'];

$añadirObservacion=new Prestamo();
$prestamo=$añadirObservacion->obtenerPrestamosId($id_prestamo);
$row = $prestamo->fetch_assoc();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="./procesoAñadirObservacion.php" method="get">
    <label for="">Id prestamo</label>
    <input type="" name="idPrestamo" value="<?php echo $row['id_prestamo']; ?>" readonly> <br>

    <label for="">Responsable</label>
    <input type="" name="" value="<?php  echo $row['numero_documento']; ?>" readonly> <br>
    <label for="">Ingrese observacion</label><br>
    <textarea rows="20" cols="50" name="observaciones" placeholder="" ><?php echo $row['observaciones']   ?></textarea><br>
    <input type="submit" value="añadir" name="btnObservacion">
</form>



    
</body>
</html>