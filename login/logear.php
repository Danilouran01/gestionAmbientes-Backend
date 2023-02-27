<?php 
    require_once '../conexionPoo.php';
    session_start();
    $con = new Conexion();
    $con->conectar();

    if(isset($_GET['msg']))
{
    $Message = $_GET['msg'];
}
    
    $numero_documento = $_POST['numero_documento'];
    $contrasena = $_POST['contrasena'];

    $query = "SELECT COUNT(*) as contar FROM usuario WHERE numero_documento ='$numero_documento' AND contrasena = '$contrasena'";
    $consulta = mysqli_query($con->con, $query);
    $array = mysqli_fetch_array($consulta);

    if($array['contar'] > 0){
        session_start();
        $_SESSION['numero_documento'] = $numero_documento;
        header('location: ../registrarPrestamoAmbiente.php');
    }else{
        header("location: ../index.php?msg=1");
    }
?>