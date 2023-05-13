<?php 
require_once "./classInstructor.php";
$documento_instructor=$_REQUEST['documento'];
$url="ver_instructor.php";

$eliminarInstructor=new Instructor();
$eliminarInstructor->eliminarUsuario($documento_instructor,$url);
?>