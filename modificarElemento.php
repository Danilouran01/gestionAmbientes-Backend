<!-- 
    <?php



    $serial = $_REQUEST['serial'];

    require_once "./classElemento.php";
    $verElementoId = new Elemento();
    $resultado = $verElementoId->obtenerElementoPorSerial($serial);
    $row = $resultado->fetch_assoc();

    ?> -->

<!--    
                    <select name="estado" id="" class="select-registro">
                        <option value="disponible">disponible</option>
                        <option value="ocupado">ocupado</option>
                        <option value="mantenimiento">en mantenimiento</option>
                    </select> -->

    
    <?php
    require_once "./classElemento.php";

    if (isset($_POST['enviarElemnto']) && !empty($_POST['enviarElemnto'])) {
        $serial = $_POST['serial'];
        $tipoDispositivo = $_POST['tipoDispositivo'];
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $placa = $_POST['placa'];
        $estado = $_POST['estado'];

        $modificarElemento = new Elemento();
        $modificarElemento ->serial=$serial;
        $modificarElemento ->tipoDispositivo=$tipoDispositivo;
        $modificarElemento ->marca=$marca;
        $modificarElemento ->modelo=$modelo;
        $modificarElemento ->placa=$placa;
        $modificarElemento ->estado=$estado;
       $modificado= $modificarElemento ->modificarElemento();
 if ($modificado) {

     header("Location: ver_elemento.php?serial=$serial");
 }else{
    echo "no se pudo registrar el elemento";
 }

    }
    ?>

</body>

</html>