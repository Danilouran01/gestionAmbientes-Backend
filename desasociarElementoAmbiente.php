<?php 

require_once "./classAmbientes.php";
require_once "./classAmbienteElemento.php";
require_once "./classElementosEstaticos.php";


if(isset($_REQUEST['serial'])  && isset($_REQUEST['id_ambiente'])){

    $serial=$_REQUEST['serial'];
    $id=$_REQUEST['id_ambiente'];

    $desasociarElemento= new AmbienteElemento();
    $resultado=$desasociarElemento->DesasociarElementoAmbiente($serial,$id);

    $actualizarElemento = new ElementosEstaticos();
$actualizarElemento->id_elemento_estatico = $serial;
$actualizarElemento->estado = 1;
$actualizar_elemento = $actualizarElemento->ActualizarEstadoElementoEstatico();


    if ($resultado && $actualizar_elemento) {
      header("Location: verInformacionAmbiente.php?idAmbiente=$id");
    }

}


?>