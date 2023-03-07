<?php
require_once "./conexionPoo.php";

session_start();
if(!isset($_SESSION['numero_documento'])){
    header("location: index.php");
};

class DetallePrestamo extends Conexion{

public  $id_detalle_prestamo;
public  $cantidad;
public int $id_prestamo;
public  $serial; 
public $mouse;
public $cargador;

public function registrarDetallePrestamo(){

    $this->conectar();
    $registrar_detalle_prestamo=mysqli_prepare($this->con,"INSERT INTO `detalle_prestamo`(`detalle_prestamo`, `cantidad`, `id_prestamo`, `serial`, `cargador`, `mouse`) VALUES (?,?,?,?,?,?)");
    $registrar_detalle_prestamo->bind_param('ssiiss',$this->id_detalle_prestamo,$this->cantidad,$this->id_prestamo,$this->serial,$this->cargador,$this->mouse);
$registrar_detalle_prestamo->execute();
       


        if ($registrar_detalle_prestamo) {
            // echo "Datos insertados correctamente";

            echo "<script>alert('datos registrados exitosamente');</script>";
           
        } else {
            echo "No se pudieron insertar los datos, error: " . mysqli_error($this->con);
        }
   }








}




?>