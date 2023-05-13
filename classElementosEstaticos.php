<?php 
require_once "./conexionPoo.php";


class ElementosEstaticos extends conexion
{
    public string $id_elemento_estatico;
    public  int $categoria;
    public string $marca;
    public  string $modelo;
    public string $placa;
    public int $estado;


    public function verElementosEstaticosIdAmbiente($id)
    {
        $this->conectar();
        $sql = "SELECT * FROM ambientes INNER JOIN ambiente_elemento on ambientes.id_numero_ambiente =ambiente_elemento.id_numero_ambiente INNER JOIN elementos_estaticos_ambiente on elementos_estaticos_ambiente.id_elemento_estatico=ambiente_elemento.id_elemento_estatico INNER JOIN categoria_elemento ON categoria_elemento.id_categoria=elementos_estaticos_ambiente.categoria_elemento INNER JOIN estado_elemento_estatico on estado_elemento_estatico.id_estado_estatico=elementos_estaticos_ambiente.estado WHERE ambiente_elemento.id_numero_ambiente=$id AND ambientes.id_numero_ambiente = $id;";;
        $sql_con = $this->con->query($sql);
        return $sql_con;
    }

    public function obtenerElemetosEstaticosPorIdAmbienteSerialPlaca($ambiente, $serial_placa, $categoria)
    {
        $this->conectar();
        $elemento_estatico = "SELECT ambiente_elemento.id_elemento_estatico,categoria_elemento.nombre_categoria,elementos_estaticos_ambiente.marca,elementos_estaticos_ambiente.modelo,estado_elemento_estatico.nombre_estado_estatico FROM ambientes INNER JOIN ambiente_elemento on ambientes.id_numero_ambiente =ambiente_elemento.id_numero_ambiente INNER JOIN elementos_estaticos_ambiente on elementos_estaticos_ambiente.id_elemento_estatico=ambiente_elemento.id_elemento_estatico INNER JOIN categoria_elemento ON categoria_elemento.id_categoria=elementos_estaticos_ambiente.categoria_elemento INNER JOIN estado_elemento_estatico on estado_elemento_estatico.id_estado_estatico=elementos_estaticos_ambiente.estado WHERE ambiente_elemento.id_numero_ambiente=$ambiente AND ambientes.id_numero_ambiente = $ambiente AND (ambiente_elemento.id_elemento_estatico='$serial_placa' OR categoria_elemento.id_categoria=$categoria OR elementos_estaticos_ambiente.placa='$serial_placa');";
        $consulta_elementos_estaticos = $this->con->query($elemento_estatico);
        if ($consulta_elementos_estaticos) {
            return $consulta_elementos_estaticos;
        } else {
            echo "error: " . mysqli_error($this->con);
        }
    }

    public function mostrarCategoriaElemento()
    {
        $this->conectar();
        $categoria_elemento_estatico = "SELECT * FROM `categoria_elemento`;";
        $resultado_categoria_elementos = $this->con->query($categoria_elemento_estatico);
        if ($resultado_categoria_elementos) {
            return $resultado_categoria_elementos;
        } else {
            echo "error: " . mysqli_error($this->con);
        }
    }


    public function obtenerElementosEstaticosDisponiblesId($serial_placa)
    {
        $this->conectar();
        $estado_dispositivo_estaticos = "SELECT * FROM `elementos_estaticos_ambiente` Where (id_elemento_estatico='$serial_placa' OR placa='$serial_placa') AND estado=1;";
        $con_estado_dispositivo_estaticos = mysqli_query($this->con, $estado_dispositivo_estaticos);
        // return $estado_dispositivo_consulta;
        if ($con_estado_dispositivo_estaticos) {
            return  $con_estado_dispositivo_estaticos;
        } else {
            echo "error : " . mysqli_error($this->con);
        }
    }

    public function obtenerElementosEstaticos()
    {
        $this->conectar();
        $dispositivo_estaticos = "
        SELECT * FROM `elementos_estaticos_ambiente` INNER JOIN categoria_elemento on categoria_elemento.id_categoria=elementos_estaticos_ambiente.categoria_elemento INNER JOIN estado_elemento_estatico ON estado_elemento_estatico.id_estado_estatico=elementos_estaticos_ambiente.estado;";
        $con_dispositivo_estaticos = mysqli_query($this->con, $dispositivo_estaticos);
        // return $estado_dispositivo_consulta;
        if ($con_dispositivo_estaticos) {
            return  $con_dispositivo_estaticos;
        } else {
            echo "error : " . mysqli_error($this->con);
        }
    }

    public function obtenerElementosEstaticosPorEstado($estado)
    {
        try {

            $this->conectar();
            $estado_dispositivo_estaticos = mysqli_prepare($this->con, "SELECT * FROM `elementos_estaticos_ambiente` WHERE `estado` = ?");
            $estado_dispositivo_estaticos->bind_param("i", $estado);
            $estado_dispositivo_estaticos->execute();

            if ($estado_dispositivo_estaticos->execute()) {


                $resultado = $estado_dispositivo_estaticos->get_result();
                mysqli_close($this->con);
                return $resultado->fetch_all(MYSQLI_ASSOC);
            } else {
                mysqli_close($this->con);
                echo "No se pudieron obtener los datos, error: " . mysqli_error($this->con);
            }

        } catch (Exception $ex) {
            mysqli_close($this->con);
            throw new Exception("Error al obtener elementos estáticos por estado: " . $ex->getMessage());
        }
    }



    public function ActualizarEstadoElementoEstatico()
    {
        $this->conectar();
        $actualizar_estado = mysqli_prepare($this->con, " UPDATE `elementos_estaticos_ambiente` SET `estado`=? WHERE `id_elemento_estatico`=?;
    ");
        $actualizar_estado->bind_param("is", $this->estado, $this->id_elemento_estatico);

        $actualizar_estado->execute();


        if ($actualizar_estado) {
            return true;
        } else {
            return false;
        }
    }


public function obtenerElementosEstaticosPorSerialPlacacategoria($serial_placa,$categoria){


    try {

        $this->conectar();
        $elementos_estaticos_serial = mysqli_prepare($this->con, "SELECT * FROM `elementos_estaticos_ambiente` INNER JOIN categoria_elemento on categoria_elemento.id_categoria=elementos_estaticos_ambiente.categoria_elemento INNER JOIN estado_elemento_estatico ON estado_elemento_estatico.id_estado_estatico=elementos_estaticos_ambiente.estado WHERE id_elemento_estatico=? OR placa=? OR categoria_elemento=?");
        $elementos_estaticos_serial->bind_param("ssi",$serial_placa,$serial_placa,$categoria);
        $elementos_estaticos_serial->execute();

        if ($elementos_estaticos_serial->execute()) {


            $resultado = $elementos_estaticos_serial->get_result();
            mysqli_close($this->con);
            return $resultado->fetch_all(MYSQLI_ASSOC);
        } else {
            mysqli_close($this->con);
            echo "No se pudieron obtener los datos, error: " . mysqli_error($this->con);
        }

    } catch (Exception $ex) {
        mysqli_close($this->con);
        throw new Exception("Error al obtener elementos estáticos por estado: " . $ex->getMessage());
    }
}


public function estadoElementoDiferenteAlActual($estado)
{
    $this->conectar();
    $estado_elemento = "SELECT * FROM `estado_elemento_estatico` WHERE estado_elemento_estatico.id_estado_estatico != $estado;    ";
    $estado_elemento_consulta = mysqli_query($this->con, $estado_elemento);
    if ($estado_elemento_consulta) {
        return  $estado_elemento_consulta;
    } else {
        echo "error : " . mysqli_error($this->con);
    }
}

public function tipoElementoDiferenteAlActual($tipo)
{
    $this->conectar();
    $tipo_elemento = "SELECT * FROM `categoria_elemento` WHERE id_categoria != $tipo;";
    $tipo_elemento_consulta = mysqli_query($this->con, $tipo_elemento);
    // return $tipo_dispositivo_consulta;
    if ($tipo_elemento_consulta) {
        return $tipo_elemento_consulta;
    } else {
        echo "error : " . mysqli_error($this->con);
    }
}



public function eliminarElementoEstatico()
{
    $this->conectar();

    $eliminar_elemento_estatico = mysqli_prepare($this->con, 'DELETE FROM `elementos_estaticos_ambiente` WHERE id_elemento_estatico=?');
    $eliminar_elemento_estatico->bind_param('s', $this->id_elemento_estatico);
    $eliminar_elemento_estatico->execute();

    $filas_afectadas = mysqli_affected_rows($this->con);

    mysqli_stmt_close($eliminar_elemento_estatico);
    mysqli_close($this->con);

    return $filas_afectadas == 1 ? true : false;
}


public function modificaElementoEstatico()
{
    $this->conectar();

    $modificar_elemento_estatico = mysqli_prepare($this->con, "UPDATE `elementos_estaticos_ambiente` SET `categoria_elemento`=?,`marca`=?,`modelo`=?,`placa`=?,`estado`=? WHERE `id_elemento_estatico`=?");
    
    $modificar_elemento_estatico->bind_param('isssis', $this->categoria,$this->marca,$this->modelo,$this->placa,$this->estado,$this->id_elemento_estatico);
    $modificar_elemento_estatico->execute();

    $num_filas_afectadas = mysqli_affected_rows($this->con);

    mysqli_stmt_close($modificar_elemento_estatico);
    mysqli_close($this->con);

    return $num_filas_afectadas == 1 ? true : false;
}





}