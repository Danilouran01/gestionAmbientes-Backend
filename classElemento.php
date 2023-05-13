<?php 
require_once "./conexionPoo.php";

class Elemento extends Conexion
{
    public string $serial;
    public string $tipoDispositivo;
    public string $marca;
    public string $modelo;
    public string $placa;
    public string $estado;
    public $fecha_registro;

    // public function __construct($serial, $tipoDispositivo, $marca, $modelo, $estado, $placa)
    // {

    //     $this->serial = $serial;
    //     $this->tipoDispositivo = $tipoDispositivo;
    //     $this->marca = $marca;
    //     $this->modelo = $modelo;
    //     $this->placa = $placa;
    //     $this->estado = $estado;
    // }

    public function registrarElemento()
    {
        $this->conectar();
        $insertElemento = mysqli_prepare($this->con, "INSERT INTO `elementos`(`serial`, `tipo_dispositivo`, `marca`, `modelo`, `placa`, `estado`) VALUES (?,?,?,?,?,?)");
        $insertElemento->bind_param("sssssi", $this->serial, $this->tipoDispositivo, $this->marca, $this->modelo, $this->placa, $this->estado);
        $insertElemento->execute();
        if ($insertElemento) {
            echo "Datos insertados correctamente";
            return true;
        } else {
            echo "No se pudieron insertar los datos, error: " . mysqli_error($this->con);
        }

        // return $insertElemento;
    }


    public function mostrarElemento()
    {
        $this->conectar();
        $sql = "SELECT * FROM `elementos` INNER JOIN estado_elementos on estado_elementos.id_estado_elemento=elementos.estado INNER JOIN tipo_dispositivo ON tipo_dispositivo.id_tipo_dispositivo =elementos.tipo_dispositivo ORDER BY elementos.serial ASC;
        ";
        $result = $this->con->query($sql);
        return $result;
    }


    public function modificarElemento()
    {
        $this->conectar();

        $modificarElemento = mysqli_prepare($this->con, "UPDATE elementos SET tipo_dispositivo=?,marca=?,modelo=?,placa=?,estado=? WHERE serial=?");
        $modificarElemento->bind_param("ssssss", $this->tipoDispositivo, $this->marca, $this->modelo, $this->placa, $this->estado, $this->serial);
        $modificarElemento->execute();
        if ($modificarElemento) {
            echo "Elemento modificado con exito";
            return true;
        } else {
            echo "No se pudieron insertar los datos, error: " . mysqli_error($this->con);
        }
    }


    public function eliminarElemento($serial)
    {
        $this->conectar();

        $query = "DELETE FROM elementos WHERE serial = ?";
        $eliminarElemento = $this->con->prepare($query);
        $eliminarElemento->bind_param("s", $serial);
        $eliminarElemento->execute();
        if ($eliminarElemento) {
            return true;
        } else {
            echo "No se pudieron insertar los datos, error: " . mysqli_error($this->con);
        }


        $this->con->close();
    }


    public function obtenerElementoPorSerial($serial)
    {
        $this->conectar();
        $sql = " SELECT * FROM `elementos` INNER JOIN estado_elementos on estado_elementos.id_estado_elemento=elementos.estado INNER JOIN tipo_dispositivo ON tipo_dispositivo.id_tipo_dispositivo =elementos.tipo_dispositivo
        WHERE serial='$serial' ";
        $resultado = $this->con->query($sql);
        return $resultado;
    }

    //----------------------------------

    public function mostrarElementosDisponibles()
    {
        $this->conectar();



        $elemento_disponible = "SELECT * FROM `elementos` INNER JOIN tipo_dispositivo on tipo_dispositivo.id_tipo_dispositivo=elementos.tipo_dispositivo WHERE elementos.estado =1";
        $resultado_elemento_disponible = $this->con->query($elemento_disponible);
        return $resultado_elemento_disponible;
    }


    public function ActualizarEstadoElemento()
    {

        $this->conectar();
        $actualizar_elemento = mysqli_prepare($this->con, "UPDATE `elementos` SET `estado`=? WHERE `serial`=?");
        $actualizar_elemento->bind_param("is", $this->estado, $this->serial);
        $actualizar_elemento->execute();
        if ($actualizar_elemento) {
            return true;
            # code...
        } else {
            return false;
        }
    }

    public function tipoElemenento()
    {

        $this->conectar();
        $tipo_dispositivo = "SELECT * FROM `tipo_dispositivo`";
        $consulta_tipo_dispositivo = mysqli_query($this->con, $tipo_dispositivo);
        return $consulta_tipo_dispositivo;
    }


    public function estadoElemento()
    {
        $estado_dispositivo = "SELECT `id_estado_elemento`, `estado_elemento` FROM `estado_elementos`";
        $consulta_estado_dispositivo = mysqli_query($this->con, $estado_dispositivo);

        return $consulta_estado_dispositivo;
    }


    public function tipoDispositivoDiferenteAlActual($tipo)
    {
        $this->conectar();
        $tipo_dispositivo = "SELECT * FROM `tipo_dispositivo` WHERE id_tipo_dispositivo != $tipo";
        $tipo_dispositivo_consulta = mysqli_query($this->con, $tipo_dispositivo);
        // return $tipo_dispositivo_consulta;
        if ($tipo_dispositivo_consulta) {
            return $tipo_dispositivo_consulta;
        } else {
            echo "error : " . mysqli_error($this->con);
        }
    }



    public function estadoDispositivoDiferenteAlActual($estado)
    {
        $this->conectar();
        $estado_dispositivo = "SELECT `id_estado_elemento`, `estado_elemento` FROM `estado_elementos` WHERE id_estado_elemento != $estado;";
        $estado_dispositivo_consulta = mysqli_query($this->con, $estado_dispositivo);
        // return $estado_dispositivo_consulta;
        if ($estado_dispositivo_consulta) {
            return  $estado_dispositivo_consulta;
        } else {
            echo "error : " . mysqli_error($this->con);
        }
    }


    public function obtenerElementoDisponiblesPorSerialTipo($serial_placa, $tipo)
    {
        try {
            $this->conectar();

            $elementos_disponibles = mysqli_prepare($this->con, "SELECT * FROM `elementos` INNER JOIN estado_elementos on estado_elementos.id_estado_elemento=elementos.estado INNER JOIN tipo_dispositivo ON tipo_dispositivo.id_tipo_dispositivo =elementos.tipo_dispositivo WHERE (serial=? OR placa=? or elementos.tipo_dispositivo =?) and elementos.estado=1;");

            $elementos_disponibles->bind_param('sss', $serial_placa,$serial_placa, $tipo);
            
            $elementos_disponibles->execute();

            $elementos = $elementos_disponibles->get_result();

            if (!$elementos) {
                throw new Exception("Error al obtener los resultados de la consulta.");
            }

            mysqli_close($this->con);

            return $elementos->fetch_all(MYSQLI_ASSOC);
        } catch (Exception $e) {
            error_log("Error en obtener elementos disponibles: " . $e->getMessage());
            return false;
        }
    }

   
}
