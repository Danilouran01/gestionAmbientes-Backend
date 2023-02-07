<?php
require_once "./conexionPoo.php";

class Elemento extends Conexion
{
    public int $serial;
    public string $tipoDispositivo;
    public string $marca;
    public string $modelo;
    public string $placa;
    public string $estado;

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
        $insertElemento->bind_param("isssss", $this->serial, $this->tipoDispositivo, $this->marca, $this->modelo, $this->placa, $this->estado);
        $insertElemento->execute();
        if ($insertElemento) {
            echo "Datos insertados correctamente";
        } else {
            echo "No se pudieron insertar los datos, error: " . mysqli_error($this->con);
        }
    }


    public function mostrarElemento()
    {
        $this->conectar();
        $sql = "SELECT * FROM `elementos`";
        $result = $this->con->query($sql);
        return $result;
    }


    public function modificarElemento()
    {
        $this->conectar();

        $modificarElemento = mysqli_prepare($this->con, "UPDATE elementos SET tipo_dispositivo=?,marca=?,modelo=?,placa=?,estado=? WHERE serial=?");
            $modificarElemento->bind_param("sssssi", $this->tipoDispositivo, $this->marca, $this->modelo, $this->placa, $this->estado, $this->serial);
            $modificarElemento->execute();
            if ($modificarElemento) {
                header("Location: ver_elemento.php");
            } else {
                echo "No se pudieron insertar los datos, error: " . mysqli_error($this->con);
            }
    }

        
        public function eliminarElemento($serial,$direccion) {
            $this->conectar();
    
            $query = "DELETE FROM elementos WHERE serial = ?";
            $eliminarElemento = $this->con->prepare($query);
            $eliminarElemento->bind_param("i", $serial);
            $eliminarElemento->execute();
            if ($eliminarElemento) {
                header("Location: " .$direccion);
            } else {
                echo "No se pudieron insertar los datos, error: " . mysqli_error($this->con);
            }

    
            $this->con->close();
        }
    

    public function obtenerElementoPorSerial($serial)
    {
        $this->conectar();
        $sql = "SELECT * FROM `elementos` WHERE serial='$serial' ";
        $resultado = $this->con->query($sql);
        return $resultado;
    }
}
