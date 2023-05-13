<?php 

require_once  "./conexionPoo.php";


class ObservacionesAmbientes  extends Conexion
{

    public $id_observacion;
    public $observacion;
    public $fecha_observacion;
    public $hora_observacion;
    public $id_numero_ambiente;


    public function agregarObservacion()
    {
        $this->conectar();

        $agregar_observacion = mysqli_prepare($this->con, 'INSERT INTO `observaciones_ambientes`(`id_observacion`, `observacion`, `fecha_observacion`, `hora_observacion`, `id_numero_ambiente`) VALUES (?,?,?,?,?);');
        $agregar_observacion->bind_param('isssi', $this->id_observacion, $this->observacion, $this->fecha_observacion, $this->hora_observacion, $this->id_numero_ambiente);
        $agregar_observacion->execute();

        $filas_afectadas = mysqli_affected_rows($this->con);

        mysqli_stmt_close($agregar_observacion);
        mysqli_close($this->con);

        return $filas_afectadas == 1 ? true : false;
    }



    public function obtenerObservacionesDeAmbiente()
    {
        $this->conectar();

        $obtener_observaciones = mysqli_prepare($this->con, "SELECT * FROM `observaciones_ambientes` WHERE observaciones_ambientes.id_numero_ambiente=? ORDER BY fecha_observacion DESC; ");
        $obtener_observaciones->bind_param('i', $this->id_numero_ambiente);
        $obtener_observaciones->execute();

        $observaciones = $obtener_observaciones->get_result();


        if (mysqli_num_rows($observaciones) == 0) {
            return false;
        }

        mysqli_close($this->con);

        return $observaciones->fetch_all(MYSQLI_ASSOC);
    }


    public function eliminarObservacion(){


        $this->conectar();

        $eliminar_observacion = mysqli_prepare($this->con, "DELETE FROM `observaciones_ambientes` WHERE observaciones_ambientes.id_observacion=?; ");
        $eliminar_observacion->bind_param('i', $this->id_observacion);
        $eliminar_observacion->execute();


        $filas_afectadas = mysqli_affected_rows($this->con);
        mysqli_stmt_close($eliminar_observacion);
        mysqli_close($this->con);

        return $filas_afectadas == 1 ? true : false;
    }


    public function obtenerObservacionPorId()
{


    $this->conectar();

    $obtener_observacion = mysqli_prepare($this->con, "SELECT * FROM `observaciones_ambientes` WHERE observaciones_ambientes.id_observacion=?; ");
    $obtener_observacion->bind_param('i', $this->id_observacion);
    $obtener_observacion->execute();

    $observacion=$obtener_observacion->get_result();

    if (mysqli_num_rows($observacion) == 0) {
        return false;
    }


    mysqli_close($this->con);

    return $observacion->fetch_all(MYSQLI_ASSOC);

}


public function modificarObservacion(){
    $this->conectar();


    $obtener_observacion = mysqli_prepare($this->con, "UPDATE `observaciones_ambientes` SET `observacion`=? WHERE observaciones_ambientes.id_observacion=?; ");
    $obtener_observacion->bind_param('si',$this->observacion ,$this->id_observacion);
    $obtener_observacion->execute();

    
    $filas_afectadas = mysqli_affected_rows($this->con);
    mysqli_stmt_close($obtener_observacion);
    mysqli_close($this->con);

    return $filas_afectadas == 1 ? true : false;
}




    
}
