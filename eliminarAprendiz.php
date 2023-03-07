<?php
require_once "./classAprendiz.php";

session_start();
if(!isset($_SESSION['numero_documento'])){
    header("location: index.php");
};

$documentoAprendiz=$_REQUEST['documento'];
$url="ver_aprendiz.php";

$eliminarAprendiz=new Aprendiz();
$eliminarAprendiz->eliminarUsuario($documentoAprendiz,$url);
?>