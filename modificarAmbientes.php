<?php 
    require_once "./classAmbientes.php";

    if (isset($_POST['modificar']) && !empty($_POST['modificar'])) {
        $id_ambiente=$_POST['numeroAmbiente'];
        $piso=$_POST['numeroPiso'];
        $resultado=$_POST['estadoAmbiente'];
        $silla=$_POST['cantSillas'];
        $linea=$_POST['lineaFormacion'];

        $modificarAmbiente = new Ambientes();
        $modificarAmbiente->id_ambiente=$id_ambiente;
        $modificarAmbiente->piso=$piso;
        $modificarAmbiente->estado=$resultado;
        $modificarAmbiente->linea_formacion=$linea;
        $modificarAmbiente->sillas=$silla;
      
        $ambiente_modificado=$modificarAmbiente->modificarAmbiente();

        if ($ambiente_modificado) {
            header("Location: ver_ambiente.php?id_ambiente=$id_ambiente");

        
        }else{
            echo "error";
        }

        //  header("Location: ver_ambiente.php?id_ambiente=$id_ambiente");
    }
    ?>



</body>

</html>