
    <?php
    include_once "./classInstructor.php";

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


        $instructor = new Instructor();
        $instructor->tipoDocumento = $tipoDocumento;
        $instructor->numeroDocumento = $numeroCedula;
        $instructor->nombre = $nombre;
        $instructor->apellido = $apellido;
        $instructor->telefono = $telefono;
        $instructor->correo = $correo;
        $instructor->rol = 2;
        $instructor->centro=NULL;
        $instructor->setFicha(NULL);
        $instructor->setContrasena(NULL);

        $instructor->registrarUsuario();

        echo '<script type="text/javascript">alert("Datos registrados correctamente");</script>';


        header("location: ./index.php?msg=4");
    }




    ?>