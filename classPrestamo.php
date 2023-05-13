<?php 
require_once "./conexionPoo.php";

class Prestamo extends Conexion
{
    public $id_prestamo;
    public $fecha_prestamo;
    public     $hora_prestamo;
    public $fecha_entrega;
    public $hora_entrega;
    public $observaciones;
    public  $id_numero_ambiente;
    public $numero_documento;
    public $estado_prestamo;



    public function registrarPrestamo()
    {

        $this->conectar();
        $registrar_prestamo = mysqli_prepare($this->con, "INSERT INTO `prestamo`(`id_prestamo`, `fecha_prestamo`, `hora_prestamo`, `fecha_entrega`, `hora_entrega`, `observaciones`, `id_numero_ambiente`, `numero_documento`,`estado_prestamo`) VALUES (?,?,?,?,?,?,?,?,?)");

        $registrar_prestamo->bind_param('ssssssiis', $this->id_prestamo, $this->fecha_prestamo, $this->hora_prestamo, $this->fecha_entrega, $this->hora_entrega, $this->observaciones, $this->id_numero_ambiente, $this->numero_documento, $this->estado_prestamo);

        $registrar_prestamo->execute();

        if ($registrar_prestamo) {
            // echo "Datos insertados correctamente";

            // echo "<script>alert('datos registrados exitosamente');</script>";
            $id_prestamo_Ai=mysqli_insert_id($this->con);
            return $id_prestamo_Ai;
        } else {
            echo "No se pudieron insertar los datos, error: " . mysqli_error($this->con);
        }
    }

   

    public function obtenerPrestamosActivosInactivos()
    {


        $this->conectar();

        $prestamos_activos = "SELECT `id_prestamo`,`nombre`,`apellido`, `fecha_prestamo`, `hora_prestamo`, `fecha_entrega`, `hora_entrega`, `observaciones`, `id_numero_ambiente`, prestamo.numero_documento, `estado_prestamo` FROM usuario INNER JOIN `prestamo` ON usuario.numero_documento=prestamo.numero_documento WHERE id_numero_ambiente IS NOT NULL ORDER BY prestamo.id_prestamo DESC;";
        $consulatr_prestamos_activos = $this->con->query($prestamos_activos);
        if($consulatr_prestamos_activos){
        return $consulatr_prestamos_activos;
        }
    }


    public function cerrarPrestamo()
    {
        $this->conectar();
        $cerrar_prestamo = mysqli_prepare($this->con, "UPDATE `prestamo` SET `fecha_entrega`=?,`hora_entrega`=?,`estado_prestamo`=? WHERE `id_prestamo`=?;");
        $cerrar_prestamo->bind_param('sssi', $this->fecha_entrega, $this->hora_entrega, $this->estado_prestamo, $this->id_prestamo);
        $cerrar_prestamo->execute();
        if ($cerrar_prestamo) {
            echo "prestamo cerrado con exito";
            return true;
           
        } else {
            echo "No se pudieron insertar los datos, error: " . mysqli_error($this->con);
        }
    }

    public function obtenerPrestamosAmbienteId($id)
    {

        $this->conectar();

        $prestamos_id = "SELECT * FROM `prestamo` INNER JOIN `usuario` ON `usuario`.`numero_documento`=`prestamo`.`numero_documento` WHERE (`prestamo`.`id_prestamo`=$id OR `prestamo`.`numero_documento`=$id) AND `prestamo`.`id_numero_ambiente` IS NOT NULL ORDER BY `prestamo`.`id_prestamo` DESC ";
        
        $consultar_prestamos_id = $this->con->query($prestamos_id);
        return $consultar_prestamos_id;
    }

    public function modificarObservacion()
    {
        $this->conectar();

        $actualizar_observacion = mysqli_prepare($this->con, "UPDATE `prestamo` SET `observaciones`=? WHERE  `id_prestamo`=?");
        $actualizar_observacion->bind_param('si', $this->observaciones, $this->id_prestamo);
        $actualizar_observacion->execute();

        $filas_afectadas = mysqli_affected_rows($this->con);
        mysqli_stmt_close($actualizar_observacion);
        mysqli_close($this->con);
    
        return $filas_afectadas == 1 ? true : false;
    }



    public function prestamoActivoAmbienteNumeroDocumento($cedula)
    {
        $this->conectar();

        $prestamo_cedula = "SELECT * FROM usuario  INNER JOIN  `prestamo` ON usuario.numero_documento=prestamo.numero_documento WHERE usuario.numero_documento=$cedula and estado_prestamo ='activo' and prestamo.id_numero_ambiente IS NOT NULL";

        $consulta_prestamo_cedula = $this->con->query($prestamo_cedula);

        return $consulta_prestamo_cedula;
    }


    
  

    public function PrestamoActivoElementosDocumento($documento){
        $this->conectar();
        $prestamo_elemento="SELECT * FROM `usuario` INNER join prestamo on usuario.numero_documento =prestamo.numero_documento INNER JOIN detalle_prestamo on prestamo.id_prestamo =detalle_prestamo.id_prestamo INNER join elementos on elementos.serial =detalle_prestamo.serial INNER JOIN tipo_dispositivo on tipo_dispositivo.id_tipo_dispositivo=elementos.tipo_dispositivo WHERE prestamo.estado_prestamo='activo' and usuario.numero_documento =$documento;";
        $consulta_prestamo_elemento=$this->con->query($prestamo_elemento);
        return $consulta_prestamo_elemento;

    }

    public function obtenerPrestamosgeneralesElementos(){
        $this->conectar();
        $prestamo_elemento="SELECT prestamo.id_prestamo, usuario.numero_documento,usuario.nombre,usuario.apellido,COUNT(prestamo.id_prestamo) as cant,fecha_prestamo,hora_prestamo,fecha_entrega,hora_entrega,observaciones,estado_prestamo FROM usuario INNER join prestamo on usuario.numero_documento =prestamo.numero_documento INNER JOIN detalle_prestamo on prestamo.id_prestamo =detalle_prestamo.id_prestamo INNER join elementos on elementos.serial =detalle_prestamo.serial INNER JOIN tipo_dispositivo on tipo_dispositivo.id_tipo_dispositivo=elementos.tipo_dispositivo GROUP BY prestamo.id_prestamo ORDER BY prestamo.id_prestamo DESC;";
        $prestamos_generales_elementos=$this->con->query($prestamo_elemento);
        return $prestamos_generales_elementos;

    }

    public function obtenerPrestamosElementosUsuarioIdPrestamo($busqueda){
        $this->conectar();
        $prestamo_elemento_id="SELECT prestamo.id_prestamo, usuario.numero_documento,usuario.nombre,usuario.apellido,COUNT(prestamo.id_prestamo) as cant,fecha_prestamo,hora_prestamo,fecha_entrega,hora_entrega,observaciones,estado_prestamo FROM usuario INNER join prestamo on usuario.numero_documento =prestamo.numero_documento INNER JOIN detalle_prestamo on prestamo.id_prestamo =detalle_prestamo.id_prestamo INNER join elementos on elementos.serial =detalle_prestamo.serial INNER JOIN tipo_dispositivo on tipo_dispositivo.id_tipo_dispositivo=elementos.tipo_dispositivo where usuario.numero_documento =$busqueda  or detalle_prestamo.id_prestamo=$busqueda GROUP BY prestamo.id_prestamo ORDER BY prestamo.id_prestamo DESC;";
        $prestamos_Usuario_elementos=$this->con->query($prestamo_elemento_id);
        return $prestamos_Usuario_elementos;

    }

    public function obtenerPrestamosElementosUsuarioFecha($documento,$fecha_inicial,$fecha_final){
        $this->conectar();
        $prestamo_elemento="SELECT prestamo.id_prestamo, usuario.numero_documento, usuario.nombre, usuario.apellido, COUNT(prestamo.id_prestamo) AS cant, fecha_prestamo, hora_prestamo, fecha_entrega, hora_entrega, observaciones, estado_prestamo FROM usuario INNER JOIN prestamo ON usuario.numero_documento = prestamo.numero_documento INNER JOIN detalle_prestamo ON prestamo.id_prestamo = detalle_prestamo.id_prestamo INNER JOIN elementos ON elementos.serial = detalle_prestamo.serial INNER JOIN tipo_dispositivo ON tipo_dispositivo.id_tipo_dispositivo = elementos.tipo_dispositivo WHERE usuario.numero_documento = $documento and (fecha_prestamo BETWEEN '$fecha_inicial' AND '$fecha_final') GROUP BY prestamo.id_prestamo ORDER BY prestamo.id_prestamo DESC;";
        $prestamos_fecha_elementos=$this->con->query($prestamo_elemento);
        return $prestamos_fecha_elementos;

    }

   

    public function validarExistenciaPrestamo($id_prestamo){
        $this->conectar();
    
        $prestamos_existente= mysqli_prepare($this->con,"SELECT * FROM prestamo WHERE id_prestamo = ?");
        $prestamos_existente->bind_param("i", $id_prestamo);
        $prestamos_existente->execute();
        $resultado_validacion =  $prestamos_existente->get_result();
        
        if (mysqli_num_rows($resultado_validacion) == 0) {
            return false;
        }
       
        mysqli_close($this->con);
        return $resultado_validacion->fetch_all(MYSQLI_ASSOC);

    }


    public function ObtenercantidadElementosPrestamo() {
    $this->conectar();
    $cantidad_elementos= mysqli_prepare($this->con, "SELECT tipo_dispositivo.tipo_dispositivo, COUNT(*) as cantidad FROM `usuario` INNER join prestamo on usuario.numero_documento =prestamo.numero_documento INNER JOIN detalle_prestamo on prestamo.id_prestamo =detalle_prestamo.id_prestamo INNER join elementos on elementos.serial =detalle_prestamo.serial INNER JOIN tipo_dispositivo on tipo_dispositivo.id_tipo_dispositivo=elementos.tipo_dispositivo INNER JOIN estado_elementos on estado_elementos.id_estado_elemento =elementos.estado WHERE detalle_prestamo.id_prestamo=? GROUP BY tipo_dispositivo.tipo_dispositivo ORDER BY tipo_dispositivo.tipo_dispositivo ASC;
    ");
    $cantidad_elementos->bind_param('i', $this->id_prestamo);

    if ($cantidad_elementos->execute()) {


        $resultado = $cantidad_elementos->get_result();
        mysqli_close($this->con);
        return $resultado->fetch_all(MYSQLI_ASSOC);


    } else {
        mysqli_close($this->con);
        echo "No se pudieron obtener los datos, error: " . mysqli_error($this->con);
    }
}



public function obtenerPrestamosAmbienteUsuarioFecha($documento,$fecha_inicial,$fecha_final){
    $this->conectar();
    $prestamo_elemento="SELECT * 
    FROM  `usuario` 
    INNER JOIN `prestamo`  ON `usuario`.`numero_documento`=`prestamo`.`numero_documento`
    WHERE `prestamo`.`numero_documento`=$documento AND (prestamo.fecha_prestamo BETWEEN '$fecha_inicial' AND '$fecha_final') AND `prestamo`.`id_numero_ambiente` IS NOT NULL ORDER BY prestamo.id_prestamo DESC;";
    $prestamos_fecha_elementos=$this->con->query($prestamo_elemento);
    return $prestamos_fecha_elementos;

}

   



   


   
}
