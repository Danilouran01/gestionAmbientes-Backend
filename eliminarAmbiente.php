<?php 
require_once "./classAmbientes.php";
require_once "./classAmbienteElemento.php";
require_once "./classElementosEstaticos.php";

$id_ambiente=$_REQUEST['idAmbiente'];

echo $id_ambiente;
$direccion="ver_ambiente.php";


$verElementosEstaticos = new ElementosEstaticos();
$elementos = $verElementosEstaticos->verElementosEstaticosIdAmbiente($id_ambiente);
var_dump($elementos);

$desasociarElemento= new AmbienteElemento();
$actualizarElemento = new ElementosEstaticos();

$count=0;
foreach($elementos as $elemento){

    $desasociar_elemento=$desasociarElemento->DesasociarElementoAmbiente($elemento['id_elemento_estatico'],$id_ambiente);

$actualizarElemento->id_elemento_estatico = $elemento['id_elemento_estatico'];
$actualizarElemento->estado = 1;
$actualizar_elemento = $actualizarElemento->ActualizarEstadoElementoEstatico();

if ($actualizar_elemento && $desasociar_elemento) {
    $count ++;
}

}


if ($count == $elementos->num_rows) {
$eliminarAmbiente=new Ambientes();
$eliminarAmbiente->eliminarAmbiente($id_ambiente,$direccion);
}





?>