<?php 

require_once "./classAmbienteElemento.php";
require_once "./classElementosEstaticos.php";

$asociarElementoAmbiete = new AmbienteElemento();
$actualizarElemento = new ElementosEstaticos();


if (isset($_REQUEST['asociar']) || (!empty($_REQUEST['idAmbiente']) && !empty($_REQUEST['serial']))) {

    $ambiente  = $_REQUEST['idAmbiente'];



    if (!empty($_REQUEST['equipos']) || !empty($_REQUEST['serial'])) {

        if (!empty($_REQUEST['equipos'])) {
            $equipos_seleccionados = $_REQUEST['equipos'];
        }

        if (!empty($_REQUEST['serial'])) {
            $equipos_seleccionados = array($_REQUEST['serial']);
        }



        // $equipos_seleccionados = array($_REQUEST['equipos']);
        count($equipos_seleccionados);

        $contador_elementos_asociados = 0;
        foreach ($equipos_seleccionados as $equipo) {


            $asociarElementoAmbiete->id_ambiente_elemento = NULL;
            $asociarElementoAmbiete->id_numero_ambiente = $ambiente;
            $asociarElementoAmbiete->id_elemento_estatico = $equipo;
            $ambiente_actualizado = $asociarElementoAmbiete->asociarAmbienteElemento();

            $actualizarElemento->id_elemento_estatico = $equipo;
            $actualizarElemento->estado = 2;
            $elemento_actualizado = $actualizarElemento->ActualizarEstadoElementoEstatico();

            if ($elemento_actualizado && $ambiente_actualizado) {
                $contador_elementos_asociados++;
            }
        }



        if ($contador_elementos_asociados == count($equipos_seleccionados)) {
            header("Location:asociarAmbienteElemento.php?idAmbiente=$ambiente&resultado=true");
        } else {
            echo "Hubo un problema al asociar y actualizar los elementos";
        }
    }else{
        header("Location: verInformacionAmbiente.php?idAmbiente=$ambiente&equiposSelect=false ");

    }
}else{
    header("Location:ver_ambiente.php");

}



?>



