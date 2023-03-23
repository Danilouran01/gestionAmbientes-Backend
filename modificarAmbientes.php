<?php
    require_once "./classAmbientes.php";

    if (isset($_POST['modificar']) && !empty($_POST['modificar'])) {
        $id_ambiente=$_POST['numeroAmbiente'];
        $piso=$_POST['numeroPiso'];
        $resultado=$_POST['estadoAmbiente'];

        $modificarAmbiente = new Ambientes();
        $modificarAmbiente->id_ambiente=$id_ambiente;
        $modificarAmbiente->piso=$piso;
        $modificarAmbiente->estado=$resultado;
      
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