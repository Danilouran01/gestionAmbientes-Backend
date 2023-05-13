<?php 
require_once "./classUsuario.php";
$documento_usuario=$_REQUEST['documento'];
$url="ver_usuario.php";

$eliminarInstructor=new Usuario();
$eliminarInstructor->eliminarUsuario($documento_usuario,$url);
?>