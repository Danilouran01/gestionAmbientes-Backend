<?php 
 require_once "./classAmbientes.php";

    if (isset($_POST['registrar'])) {
        

    
       
        $sillas = isset($_POST['cantSillas']) ? $_POST['cantSillas'] : 0;

        $ambiente =new Ambientes();
        $ambiente->id_ambiente = $_POST['numeroAmbiente'];
        $ambiente->piso = $_POST['numeroPiso'];
        $ambiente->estado = $_POST['estadoAmbiente'];
        $ambiente->linea_formacion=$_POST['lineaFormacion'];
        $ambiente->sillas=$sillas;

       $registrar_ambiente =$ambiente->registrarAmbiente();
       $numero_ambiente=$_POST['numeroAmbiente'];
       

if ($registrar_ambiente){

    header("Location: registrarPrestamoAmbiente.php?ambiente=$numero_ambiente");
}
        

        
    }

    ?>
</body>

</html>





