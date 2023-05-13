<?php 
require_once "./classAprendiz.php";
$documentoAprendiz=$_REQUEST['documento'];
$url="ver_aprendiz.php";

$eliminarAprendiz=new Aprendiz();
$eliminarAprendiz->eliminarUsuario($documentoAprendiz,$url);
?>