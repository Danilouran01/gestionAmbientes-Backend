<?php
require_once "./classInstructor.php";

session_start();
if(!isset($_SESSION['numero_documento'])){
    header("location: index.php");
};

$documento_instructor=$_REQUEST['documento'];
$url="ver_instructor.php";

$eliminarInstructor=new Instructor();
$eliminarInstructor->eliminarUsuario($documento_instructor,$url);
?>