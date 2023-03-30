<?php
  
include_once "./classUsuario.php";
  if (isset($_POST['enviar'])) {

      $tipoDocumento = $_POST['tipoDocumento'];
      $numeroCedula = $_POST['numeroCedula'];
      $nombre = $_POST['nombre'];
      $apellido = $_POST['apellido'];
      $telefono = $_POST['telefono'];
      $correo = $_POST['correo'];
      $rol = $_POST['rol'];

      if (isset($_POST['centro'])) {
        $centro=$_POST['centro'];
      }else{
        $centro=NULL;
      }
      if (isset($_POST['contrasena'])) {
        $contrasena=$_POST['contrasena'];
      }else{
        $contrasena=NULL;
      }
      
  
      $usuario = new Usuario();
      $usuario->tipoDocumento=$tipoDocumento;
      $usuario->numeroDocumento=$numeroCedula;
      $usuario->nombre=$nombre;
      $usuario->apellido=$apellido;
      $usuario->telefono=$telefono;
      $usuario->correo=$correo;
      $usuario->rol=$rol;
      $usuario->setFicha($centro);
      $usuario->setContrasena($contrasena);
     $usuario_modificado= $usuario->modificarUsuario();

     if ($usuario_modificado) {
        header( "Location: ver_usuario.php?documento=$numeroCedula");
        # code...
     }



  }
