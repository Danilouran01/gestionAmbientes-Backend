<?php
require_once"./conexionPoo.php";

class Administrador extends Conexion{
public $tipoDocumento;
public $numeroDocumento;
public $numeroFicha;
public $nombre;
public $apellido;
public $telefono;
public $correo;
private $contrasena;
public $rol;


    public function create(){
        $this->conectar();


        $pre2=mysqli_prepare($this->con,"INSERT INTO `usuario`(`numero_documento`, `nombre`, `apellido`, `tipo_documento`, `numero_ficha`, `telefono`, `correo`, `contrasena`, `id_rol`) VALUES (?,?,?,?,?,?,?,?,?)");
        $pre2->bind_param("ississssi",$this->numeroDocumento,$this->nombre,$this->apellido,$this->tipoDocumento,$this->numeroFicha,$this->telefono,$this->correo,$this->contrasena,$this->rol);
        $pre2->execute();
        if ($pre2 ) {
            echo "Datos insertados correctamente";
        } else {
            echo "No se pudieron insertar los datos, error: " . mysqli_error($this->con);
        }
    }

    public function setContrasena($contrasenaFormulario){
        $this->contrasena=$contrasenaFormulario;
    }
}
