<?php 
require_once "./conexionPoo.php";

class Prestamo extends Conexion{
    public $id_prestamo;
    public $fecha_prestamo;
    public 	$hora_prestamo;
    public $fecha_entrega;
    public $hora_entrega;
    public $observaciones;
    public  $id_numero_ambiente;
    public $numero_documento ;
    public $estado_prestamo;


    public function registrarPrestamo(){

        $this->conectar();
        $registrar_prestamo=mysqli_prepare($this->con,"INSERT INTO `prestamo`(`id_prestamo`, `fecha_prestamo`, `hora_prestamo`, `fecha_entrega`, `hora_entrega`, `observaciones`, `id_numero_ambiente`, `numero_documento`,`estado_prestamo`) VALUES (?,?,?,?,?,?,?,?,?)");

        $registrar_prestamo->bind_param('ssssssiis',$this->id_prestamo,$this->fecha_prestamo,$this->hora_prestamo,$this->fecha_entrega,$this->hora_entrega,$this->observaciones,$this->id_numero_ambiente,$this->numero_documento,$this->estado_prestamo);

        $registrar_prestamo->execute();

        if ($registrar_prestamo) {
                echo "Datos insertados correctamente";
            } else {
                echo "No se pudieron insertar los datos, error: " . mysqli_error($this->con);
            }
        
    }


    public function obtenerPrestamosActivos($estado){


        $this->conectar();
      
         $prestamos_activos="SELECT * FROM `prestamo` WHERE estado_prestamo='$estado'";
        $consulatr_prestamos_activos = $this->con->query( $prestamos_activos);
        return $consulatr_prestamos_activos;


    
    }



    public function cerrarPrestamo(){
        $this->conectar();
        $cerrar_prestamo=mysqli_prepare($this->con,"UPDATE `prestamo` SET `fecha_entrega`=?,`hora_entrega`=?,`estado_prestamo`=? WHERE `id_prestamo`=?;");
        $cerrar_prestamo->bind_param('sssi',$this->fecha_entrega,$this->hora_entrega,$this->estado_prestamo,$this->id_prestamo);
        $cerrar_prestamo->execute();
        if ($cerrar_prestamo) {
            header("Location: verPrestamosActivos.php");
        }else{
            echo "No se pudieron insertar los datos, error: " . mysqli_error($this->con);
        }
    }


}
