    <?php  
    include_once "./classAprendiz.php";

    if(isset($_GET['msg']))
    {
        $Message = $_GET['msg'];
    }

    if (isset($_POST['enviar'])) {

        $tipoDocumento = $_POST['tipoDocumento'];
        $numeroCedula = $_POST['numeroCedula'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];
        $ficha = $_POST['ficha'];



        $aprendiz = new Aprendiz();
        $aprendiz->tipoDocumento = $tipoDocumento;
        $aprendiz->numeroDocumento = $numeroCedula;
        $aprendiz->nombre = $nombre;
        $aprendiz->apellido = $apellido;
        $aprendiz->telefono = $telefono;
        $aprendiz->correo = $correo;
        $aprendiz->rol = 3;
        $aprendiz->setFicha($ficha);
        $aprendiz->setContrasena(NULL);

        $aprendiz->registrarUsuario();

        echo '<script type="text/javascript">alert("Datos registrados correctamente");</script>';

        
        header("location: ./index.php?msg=5");
    }


    ?>

   