    <?php  
    include_once "./classInvitado.php";

    if(isset($_GET['msg']))
    {
        $Message = $_GET['msg'];
    }

    if (isset($_POST['enviar'])) {

        $tipoDocumento = $_POST['tipoDocumento'];
        $numeroCedula = $_POST['numeroCedula'];
        $telefono = $_POST['telefono'];
        $centro = $_POST['centro'];
        $nombre = strtolower($_POST['nombre']);
        $apellido = strtolower($_POST['apellido']);
        $correo = strtolower($_POST['correo']);



        $invitado = new Aprendiz();
        $invitado->tipoDocumento = $tipoDocumento;
        $invitado->numeroDocumento = $numeroCedula;
        $invitado->nombre = $nombre;
        $invitado->apellido = $apellido;
        $invitado->telefono = $telefono;
        $invitado->correo = $correo;
        $invitado->rol = 3;
        $invitado->centro=$centro;
        $invitado->setFicha(Null);
        $invitado->setContrasena(NULL);

        $invitado->registrarUsuario();

        echo '<script type="text/javascript">alert("Datos registrados correctamente");</script>';

        
        header("location: ./index.php?msg=5");
    }


    ?>

   