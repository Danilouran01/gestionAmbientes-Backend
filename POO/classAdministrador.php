<?php
require_once "./classUsuario.php";

class Administradorr extends Usuario{

    public function __construct($tipoDocumento,$numeroDocumento,$nombre,$apellido,$telefono,$correo,$rol,$ficha,$contrasena) {
        parent::__construct($tipoDocumento,$numeroDocumento,$nombre,$apellido,$telefono,$correo,$rol,$ficha,$contrasena);
    
      }
}

?>