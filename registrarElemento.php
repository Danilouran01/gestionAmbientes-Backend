
    <?php
    require_once "./classElemento.php";

    if (isset($_REQUEST['enviarElemento'])) {
        $serial = $_POST['serial'];
        $tipoDispositivo = $_POST['tipoDispositivo'];
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $placa = $_POST['placa'];
        $estado = $_POST['estado'];

        // inicio nuevo objecto
        $elemento = new Elemento();
        $elemento->serial = $serial;
        $elemento->tipoDispositivo = $tipoDispositivo;
        $elemento->marca = $marca;
        $elemento->modelo = $modelo;
        $elemento->placa = $placa;
        $elemento->estado = $estado;
        $elemento->registrarElemento();
        $j=$elemento->registrarElemento();
        //fin

      


    }


    ?>