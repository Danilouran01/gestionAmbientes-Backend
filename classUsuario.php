<?php 
require_once "./conexionPoo.php";

class Usuario extends Conexion
{
    public $tipoDocumento;
    public $numeroDocumento;
    public $nombre;
    public $apellido;
    public $telefono;
    public $correo;
    public $rol;
    public $centro;
    private $ficha;
    private $contrasena;


    // public function __construct($tipoDocumento, $numeroDocumento, $nombre, $apellido, $telefono, $correo, $rol, $ficha, $contrasena)
    // {
    //     $this->tipoDocumento = $tipoDocumento;
    //     $this->numeroDocumento = $numeroDocumento;
    //     $this->nombre = $nombre;
    //     $this->apellido = $apellido;
    //     $this->telefono = $telefono;
    //     $this->correo = $correo;
    //     $this->rol = $rol;
    //     $this->ficha = $ficha;
    //     $this->contrasena = $contrasena;
    // }


    public function registrarUsuario()
    {
        $this->conectar();

        $consulta_usuario_instructor = mysqli_prepare($this->con, "INSERT INTO `usuario`(`numero_documento`, `nombre`, `apellido`, `tipo_documento`, `numero_ficha`, `centro`, `telefono`, `correo`, `contrasena`, `id_rol`) VALUES (?,?,?,?,?,?,?,?,?,?)");
        $consulta_usuario_instructor->bind_param("issiissssi", $this->numeroDocumento, $this->nombre, $this->apellido, $this->tipoDocumento, $this->ficha,$this->centro, $this->telefono, $this->correo, $this->contrasena, $this->rol);
        $consulta_usuario_instructor->execute();
        if ($consulta_usuario_instructor) {
            echo "Datos insertados correctamente";
        } else {
            echo "No se pudieron insertar los datos, error: " . mysqli_error($this->con);
        }
    }


    public function listarUsuario()
    {
        $this->conectar();

        $listar_usuario = "SELECT `numero_documento`, `nombre`, `apellido`, `tipo`, `numero_ficha`, `telefono`, `correo`, `nombre_rol` FROM tipo_documento INNER JOIN usuario on usuario.tipo_documento=tipo_documento.idDocumento INNER JOIN rol ON rol.id_rol=usuario.id_rol  ";
        $consulta_listar_usuario = $this->con->query($listar_usuario);
        return $consulta_listar_usuario;
    }


    public function filtrarUsuarioIdNombreRol($busqueda,$rol){
        $this->conectar();

        $filtrar_usuario="SELECT * ,usuario.id_rol as rol FROM tipo_documento INNER JOIN usuario on usuario.tipo_documento=tipo_documento.idDocumento INNER JOIN rol ON rol.id_rol=usuario.id_rol WHERE numero_documento='$busqueda'OR (nombre LIKE '%$busqueda%' OR apellido LIKE '%$busqueda%' OR CONCAT(nombre, ' ', apellido) LIKE '%$busqueda%')OR usuario.id_rol='$rol';";
        $sql_filtrar_usario=$this->con->query($filtrar_usuario);

        if ($sql_filtrar_usario) {
            return $sql_filtrar_usario;
        }else{
            echo "No se pudieron insertar los datos, error: " . mysqli_error($this->con);

            
            
        }
       

    }
    public function mostrarUsuario($rol)
    {
        $this->conectar();

        $mostrar_usuario = "SELECT `numero_documento`, `nombre`, `apellido`, `tipo`, `numero_ficha`, `telefono`, `correo`, `nombre_rol` FROM tipo_documento INNER JOIN usuario on usuario.tipo_documento=tipo_documento.idDocumento INNER JOIN rol ON rol.id_rol=usuario.id_rol WHERE usuario.id_rol=$rol ";
        $consulta_mostrar_usuario = $this->con->query($mostrar_usuario);
        return $consulta_mostrar_usuario;
    }

    public function eliminarUsuario($documento, $url)
    {
        $this->conectar();
        $eliminarAprendiz = mysqli_prepare($this->con, "DELETE FROM `usuario` WHERE numero_documento=? ");
        $eliminarAprendiz->bind_param("i", $documento);
        $eliminarAprendiz->execute();
        if ($eliminarAprendiz) {
            header("Location:" . $url);
        } else {
            echo "No se pudieron insertar los datos,error: " . mysqli_error($this->con);
        }

        $this->con->close();
    }

    public function obtenerUsuarioId($idUsuario){
        $this->conectar();
        $sql="SELECT * FROM tipo_documento INNER JOIN usuario on usuario.tipo_documento=tipo_documento.idDocumento INNER JOIN rol ON rol.id_rol=usuario.id_rol WHERE numero_documento=$idUsuario";
        $obtenerUsuarioId = $this->con->query($sql);
        return $obtenerUsuarioId;

    }

    public function obtenerUsuarioIdRol($idUsuario,$rol){
        $this->conectar();
        $sql="SELECT * FROM tipo_documento INNER JOIN usuario on usuario.tipo_documento=tipo_documento.idDocumento INNER JOIN rol ON rol.id_rol=usuario.id_rol WHERE numero_documento=$idUsuario AND usuario.id_rol=$rol";
        $obtenerUsuarioId = $this->con->query($sql);
        return $obtenerUsuarioId;

    }

    public function modificarUsuario(){
        $this->conectar();

        $sqlModificar=mysqli_prepare($this->con,"UPDATE `usuario` SET `nombre`=?,`apellido`=?,`tipo_documento`=?,`numero_ficha`=?,`centro`=?,`telefono`=?,`correo`=?,`contrasena`=?,`id_rol`=? WHERE `numero_documento`=? ");
        $sqlModificar->bind_param("ssisssssii",$this->nombre,$this->apellido,$this->tipoDocumento,$this->ficha,$this->centro,$this->telefono,$this->correo,$this->contrasena,$this->rol,$this->numeroDocumento);
        $sqlModificar->execute();
        if ($sqlModificar) {
            return true;
        } else {
            echo "No se pudieron insertar los datos, error: " . mysqli_error($this->con);
        }


    }


    public function obtenerTipoDocumento($idDocumento){
        $this->conectar();
        $select = "SELECT `idDocumento`, `tipo` FROM `tipo_documento` WHERE tipo_documento.idDocumento !=$idDocumento;";
        $resultadoSelect = mysqli_query($this->con, $select);
        return $resultadoSelect;
    }


    public function filtrarUsuario($idUsuario){
        $this->conectar();
        // $sql = "SELECT `numero_documento`, `nombre`, `apellido`, `tipo_documento`, `numero_ficha`, `telefono`, `correo`, `id_rol` FROM `usuario` WHERE numero_documento= $idUsuario ";
        $sql="SELECT * FROM tipo_documento INNER JOIN usuario on usuario.tipo_documento=tipo_documento.idDocumento INNER JOIN rol ON rol.id_rol=usuario.id_rol WHERE numero_documento= $idUsuario";
        $obtenerUsuarioId = $this->con->query($sql);
        return $obtenerUsuarioId;
    }

    public function setContrasena($contrasena)
    {           
        $this->contrasena = $contrasena;
    }


    public function getContrasena($contrasena)
    {
        $this->contrasena = $contrasena;
    }

    public function setFicha($ficha)
    {
        $this->ficha = $ficha;
    }

    public function getFicha($ficha)
    {
        $this->ficha = $ficha;
    }


    public function mostrarTipoDocumentoSelect(){
        $this->conectar();
                
                                $tipo_documento = "SELECT * FROM `tipo_documento`";
                                $resultado_sql = mysqli_query($this->con,$tipo_documento);
                                return $resultado_sql;
        
            }


            
        
}
