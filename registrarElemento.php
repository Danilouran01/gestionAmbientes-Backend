
    <?php 
    require_once "./classElemento.php";

    if (isset($_REQUEST['enviarElemento']) || isset($_REQUEST['registrarElemento']) ) {
     
        if (isset($_REQUEST['registrarElemento'])) {
            $ver_elemento=True;
        }

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
        // $elemento->registrarElemento();
        $registro_elemento=$elemento->registrarElemento();
        if($registro_elemento){
            if ($ver_elemento) {
                header("Location: ver_elemento.php?serial=$serial&idElemento=$serial");
            }else{
                header("Location: registrarPrestamoElementos.php?serial=$serial");
            }

        

        }

        var_dump($j);
        echo "-----". $j;
//  echo  "----------" . $j;
      


    }


    ?>