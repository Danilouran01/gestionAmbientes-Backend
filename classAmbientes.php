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
        if ($pre) {
            echo "Datos insertados correctamente";
            return true;
        } else {
            echo "No se pudieron insertar los datos, error: " . mysqli_error($this->con);
            return false;
        }
        $this->con->close();
    }

    public function mostrarAmbiente()
    {
        $this->conectar();
        $sql = "SELECT `id_numero_ambiente`, `piso`, estado_ambiente,`id_estado_ambiente`,`cantidad_sillas` FROM `ambientes` inner JOIN estado_ambiente ON ambientes.estado=estado_ambiente.id_estado_ambiente";
        $resultado = $this->con->query($sql);
        return $resultado;
        $this->con->close();
    }


    public function mostrarAmbienteEstado()
    {
        $this->conectar();
        $sql = "SELECT `id_numero_ambiente`, `piso`, estado_ambiente,`id_estado_ambiente` FROM `ambientes` inner JOIN estado_ambiente ON ambientes.estado=estado_ambiente.id_estado_ambiente WHERE id_estado_ambiente=1";
        $resultado = $this->con->query($sql);
        return $resultado;
        $this->con->close();
    }


    public function obtenerAmbientePorId($id)
    {
        $this->conectar();
        $sql = "SELECT *  FROM `ambientes` inner JOIN estado_ambiente ON ambientes.estado=estado_ambiente.id_estado_ambiente WHERE id_numero_ambiente='$id' ";
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
            return true;
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
            return true;
        } else {
            echo "No se pudieron insertar los datos, error: " . mysqli_error($this->con);
        }

        $this->con->close();
    }


    public function estadoAmbiente(){
        $this->conectar();
        
    $sql_estado = "SELECT * FROM `estado_ambiente`";
    $resultado_sql= $this->con->query($sql_estado);

    if ($resultado_sql){
        return  $resultado_sql;
    }else{
        echo "error: " . mysqli_error($this->con);
    } 
    
    $this->con->close();

    }


    public function estadoAmbienteDiferenteActual($estado){
        $this->conectar();
        
    $estado_ambiente = "SELECT * FROM `estado_ambiente` Where id_estado_ambiente != $estado ";
    $resultado_estado_ambiente = $this->con->query($estado_ambiente );

    if ($resultado_estado_ambiente){
        return  $resultado_estado_ambiente;
    }else{
        echo "error: " . mysqli_error($this->con);
    } 
    
    $this->con->close();

    }


    public function verElementosEstaticosId($id){
        $this->conectar();
        $sql="SELECT * FROM ambientes INNER JOIN ambiente_elemento on ambiente_elemento.id_ambiente_elemento<=ambientes.id_numero_ambiente INNER JOIN elementos_estaticos_ambiente on elementos_estaticos_ambiente.id_elemento_estatico=ambiente_elemento.id_elemento_estatico INNER JOIN categoria_elemento on categoria_elemento.id_categoria=elementos_estaticos_ambiente.categoria_elemento WHERE ambiente_elemento.id_numero_ambiente=$id and ambientes.id_numero_ambiente=$id;";
    ;
    $sql_con=$this->con->query($sql);
    return $sql_con;
    }
    


}
