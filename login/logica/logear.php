<?php 
    require 'conexion.php';
    session_start();
    
    $numero_documento = $_POST['numero_documento'];
    $contrasena = $_POST['contrasena'];

    $query = "SELECT COUNT(*) as contar FROM usuario WHERE numero_documento ='$numero_documento' AND contrasena = '$contrasena'";
    $consulta = mysqli_query($conexion, $query);
    $array = mysqli_fetch_array($consulta);

    if($array['contar'] > 0){
        $_SESSION['numero_documento'] = $numero_documento;
        header('location: ../inicio.php');
    }else{
        echo 'datos incorrectos';
    }
?>