

                    <!-- <input type="text" name="elementoAmbiente" placeholder="elemento ambiente"> -->
       


    <?php
 require_once "./classAmbientes.php";

    if (isset($_POST['registrar'])) {
       

        $ambiente =new Ambientes();
        $ambiente->id_ambiente = $_POST['numeroAmbiente'];
        $ambiente->piso = $_POST['numeroPiso'];
        $ambiente->estado = $_POST['estadoAmbiente'];

       $registrar_ambiente =$ambiente->registrarAmbiente();
       $numero_ambiente=$_POST['numeroAmbiente'];
       

if ($registrar_ambiente){

    header("Location: registrarPrestamoAmbiente.php?ambiente=$numero_ambiente");
}
        

        
    }

    ?>
</body>

</html>





