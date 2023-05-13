
    <?php 
    include_once "./classInstructor.php";

    if (isset($_GET['msg'])) {
        $Message = $_GET['msg'];
    }

    if (isset($_POST['enviar'])) {

        $tipoDocumento = $_POST['tipoDocumento'];
        $numeroCedula = $_POST['numeroCedula'];
        $telefono = $_POST['telefono'];
        $nombre = strtolower($_POST['nombre']);
        $apellido = strtolower($_POST['apellido']);
        $correo = strtolower($_POST['correo']);

        $instructor = new Instructor();
        $instructor->tipoDocumento = $tipoDocumento;
        $instructor->numeroDocumento = $numeroCedula;
        $instructor->nombre = $nombre;
        $instructor->apellido = $apellido;
        $instructor->telefono = $telefono;
        $instructor->correo = $correo;
        $instructor->rol = 2;
        $instructor->centro = NULL;
        $instructor->setFicha(NULL);
        $instructor->setContrasena(NULL);

        $instructor->registrarUsuario();

        echo '<script type="text/javascript">alert("Datos registrados correctamente");</script>';


        header("location: ./index.php?msg=4");
    }




    ?>