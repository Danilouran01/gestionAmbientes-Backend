<?php 
  
include_once "./classInstructor.php";
  if (isset($_POST['enviar'])) {

      $tipoDocumento = $_POST['tipoDocumento'];
      $numeroCedula = $_POST['numeroCedula'];
      $nombre = $_POST['nombre'];
      $apellido = $_POST['apellido'];
      $telefono = $_POST['telefono'];
      $correo = $_POST['correo'];
      $rol = $_POST['rol'];
  
      $instructor = new Instructor();
      $instructor->tipoDocumento=$tipoDocumento;
      $instructor->numeroDocumento=$numeroCedula;
      $instructor->nombre=$nombre;
      $instructor->apellido=$apellido;
      $instructor->telefono=$telefono;
      $instructor->correo=$correo;
      $instructor->rol=2;
      $instructor->setFicha(0);
      $instructor->setContrasena(NULL);
      $instructor->modificarUsuario();



  }

  

?>