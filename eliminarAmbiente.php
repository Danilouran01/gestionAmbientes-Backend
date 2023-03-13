<?php 
require_once "./classAmbientes.php";
$idAmbiente=$_REQUEST['idAmbiente'];

echo $idAmbiente;
$direccion="ver_ambiente.php";

$eliminarAmbiente=new Ambientes();
$eliminarAmbiente->eliminarAmbiente($idAmbiente,$direccion);



?>