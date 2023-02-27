<?php

include("config.php");

if(!isset($_GET["code"])){
    exit("can't find page");
}

$code = $_GET["code"];

$getEmailQuery = mysqli_query($con, "SELECT email FROM resetpasswords WHERE code='$code'");
if(mysqli_num_rows($getEmailQuery) == 0){
    exit("can't find page");
}

if(isset($_POST["password"])){
    $pw = $_POST["password"];
    $pw = md5($pw);

    $row = mysqli_fetch_array($getEmailQuery);
    $email = $row["email"];

    $query = mysqli_query($con, "UPDATE usuario SET contrasena='$pw' WHERE correo='$email'");

    if($query){
        $query = mysqli_query($con, "DELETE FROM resetpasswords WHERE code='$code'");
        exit("Contraseña Actualizada");
    } else {
        exit("Ocurrio un error");
    }
}
?>

<form method="POST">
    <input type="password" name="password" placeholder="Nueva Contraseña">
    <br>
    <input type="submit" name="submit" value="Actualizar contraseña">
</form>