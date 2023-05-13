<?php  
require_once "./classElementosEstaticos.php";

if (isset($_REQUEST['modificarElemento'])) {
    $serial = $_POST['serial'];
    $categoria_elemento = $_POST['categoriaElemento'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $placa = $_POST['placa'];
    $estado = $_POST['estado'];

    $modificarElemento = new ElementosEstaticos();
    $modificarElemento ->id_elemento_estatico=$serial;
    $modificarElemento ->categoria=$categoria_elemento;
    $modificarElemento ->marca=$marca;
    $modificarElemento ->modelo=$modelo;
    $modificarElemento ->placa=$placa;
    $modificarElemento ->estado=$estado;
    $modificado= $modificarElemento->modificaElementoEstatico();


 header("Location: verElementosEstaticos.php?serial=$serial&modificar=$modificado");



}



?>