<?php 
require_once "./classAmbientes.php";

session_start();
if(!isset($_SESSION['numero_documento'])){
    header("location: index.php");
};

$idAmbiente=$_REQUEST['idAmbiente'];

echo $idAmbiente;
$direccion="ver_ambiente.php";

$eliminarAmbiente=new Ambientes();
$eliminarAmbiente->eliminarAmbiente($idAmbiente,$direccion);



?>