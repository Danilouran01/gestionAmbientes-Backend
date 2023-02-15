<?php
require_once "./conexionPoo.php";


class Ambientes extends conexion
{
    public $id_ambiente;
    public $piso;
    public $estado;


    public function registrarAmbiente()
    {
        $this->conectar();

        $pre = mysqli_prepare($this->con, "INSERT INTO `ambientes`(`id_numero_ambiente`, `piso`, `estado`) VALUES (?,?,?)");
        $pre->bind_param("iii", $this->id_ambiente, $this->piso, $this->estado);
        $pre->execute();
        if ($pre == TRUE) {
            echo "Datos insertados correctamente";
        } else {
            echo "No se pudieron insertar los datos, error: " . mysqli_error($this->con);
        }
        $this->con->close();
    }

    public function mostrarAmbiente()
    {
        $this->conectar();
        $sql = "SELECT `id_numero_ambiente`, `piso`, estado_ambiente,`id_estado_ambiente` FROM `ambientes` inner JOIN estado_ambiente ON ambientes.estado=estado_ambiente.id_estado_ambiente";
        $resultado = $this->con->query($sql);
        return $resultado;
        $this->con->close();
    }


    public function obtenerAmbientePorId($id)
    {
        $this->conectar();
        $sql = "SELECT `id_numero_ambiente`, `piso`, estado_ambiente FROM `ambientes` inner JOIN estado_ambiente ON ambientes.estado=estado_ambiente.id_estado_ambiente WHERE id_numero_ambiente='$id' ";
        $resultado = $this->con->query($sql);
        return $resultado;
        $this->con->close();
    }

    public function eliminarAmbiente($id_ambiente, $direccion)
    {
        $this->conectar();

        $query = "DELETE FROM ambientes WHERE  id_numero_ambiente= ?";
        $eliminarAmbiente = $this->con->prepare($query);
        $eliminarAmbiente->bind_param("i", $id_ambiente);
        $eliminarAmbiente->execute();
        if ($eliminarAmbiente) {
            header("Location: " . $direccion);
        } else {
            echo "No se pudieron insertar los datos,error: " . mysqli_error($this->con);
        }

        $this->con->close();
    }




    public function modificarAmbiente()


    {
        $this->conectar();

        $modificarAmbiente = mysqli_prepare($this->con, "UPDATE `ambientes` SET `id_numero_ambiente`=?,`piso`=?,`estado`=? WHERE id_numero_ambiente=?");
        $modificarAmbiente->bind_param("isii", $this->id_ambiente, $this->piso, $this->estado, $this->id_ambiente);
        $modificarAmbiente->execute();
        if ($modificarAmbiente) {
            header("Location: ver_ambiente.php");
        } else {
            echo "No se pudieron insertar los datos, error: " . mysqli_error($this->con);
        }

        $this->con->close();
    }


    public function actualizarEstadoAmbiente()
    {
        $this->conectar();

        $actualizar_estado_ambiente = mysqli_prepare($this->con, "UPDATE `ambientes` SET `estado`=? 
        WHERE `id_numero_ambiente`=? ");



        $actualizar_estado_ambiente->bind_param('si', $this->estado, $this->id_ambiente);

        $actualizar_estado_ambiente->execute();

        if ($actualizar_estado_ambiente) {
            // header("Location: ver_ambiente.php");
            echo "estado actualizado con exito";
        } else {
            echo "No se pudieron insertar los datos, error: " . mysqli_error($this->con);
        }

        $this->con->close();
    }
}
