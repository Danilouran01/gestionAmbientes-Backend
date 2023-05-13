<?php 
require_once "./conexionPoo.php";


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
    $registrar_detalle_prestamo->bind_param('ssisss',$this->id_detalle_prestamo,$this->cantidad,$this->id_prestamo,$this->serial,$this->cargador,$this->mouse);
$registrar_detalle_prestamo->execute();
       
        if ($registrar_detalle_prestamo) {
            // echo "Datos insertados correctamente";
            // echo "<script>alert('datos registrados exitosamente');</script>";
           return true;
        } else {
            echo "No se pudieron insertar los datos, error: " . mysqli_error($this->con);
        }
   }


   public function obtenerElementosPorPrestamo($id_prestamo){
    $this->conectar();

    $prestamo_elemento="SELECT serial FROM detalle_prestamo WHERE detalle_prestamo.id_prestamo=$id_prestamo";
    $elementos_prestamo = $this->con->query($prestamo_elemento);
    if ($elementos_prestamo ) {
        return $elementos_prestamo;
    }else{
        echo "No se pudieron obtener los datos, error: " . mysqli_error($this->con);
    }
    


   }

//    public function ObtenerDetallePrestamoElementos(){
//     $this->conectar();
//     $detalle_prestamo=mysqli_prepare($this->con,"SELECT * FROM `usuario` INNER join prestamo on usuario.numero_documento =prestamo.numero_documento INNER JOIN detalle_prestamo on prestamo.id_prestamo =detalle_prestamo.id_prestamo INNER join elementos on elementos.serial =detalle_prestamo.serial INNER JOIN tipo_dispositivo on tipo_dispositivo.id_tipo_dispositivo=elementos.tipo_dispositivo WHERE detalle_prestamo.id_prestamo=?");
//     $detalle_prestamo->bind_param('i',$this->id_prestamo);
//     $detalle_prestamo->execute();
//     if ($detalle_prestamo) {
//         return $detalle_prestamo;
//     }else{
//         echo "No se pudieron obtener los datos, error: " . mysqli_error($this->con);
//     }
// }

// public function ObtenerDetallePrestamoElementos($id){
//     $this->conectar();

// $detalle_prestamo="SELECT * FROM `usuario` INNER join prestamo on usuario.numero_documento =prestamo.numero_documento INNER JOIN detalle_prestamo on prestamo.id_prestamo =detalle_prestamo.id_prestamo INNER join elementos on elementos.serial =detalle_prestamo.serial INNER JOIN tipo_dispositivo on tipo_dispositivo.id_tipo_dispositivo=elementos.tipo_dispositivo WHERE detalle_prestamo.id_prestamo= $id";
// $elementos_prestamo = $this->con->query($detalle_prestamo);
//     if ($elementos_prestamo ) {
//         return $elementos_prestamo;
//     }else{
//         echo "No se pudieron obtener los datos, error: " . mysqli_error($this->con);
//     }
    

// }


public function ObtenerDetallePrestamoElementos() {
    $this->conectar();
    $detalle_prestamo = mysqli_prepare($this->con, "SELECT * FROM `usuario` INNER join prestamo on usuario.numero_documento =prestamo.numero_documento INNER JOIN detalle_prestamo on prestamo.id_prestamo =detalle_prestamo.id_prestamo INNER join elementos on elementos.serial =detalle_prestamo.serial INNER JOIN tipo_dispositivo on tipo_dispositivo.id_tipo_dispositivo=elementos.tipo_dispositivo INNER JOIN estado_elementos on estado_elementos.id_estado_elemento =elementos.estado WHERE detalle_prestamo.id_prestamo=? ORDER BY elementos.serial ASC;");
    $detalle_prestamo->bind_param('i', $this->id_prestamo);

    if ($detalle_prestamo->execute()) {


        $resultado = $detalle_prestamo->get_result();
        mysqli_close($this->con);
        return $resultado->fetch_all(MYSQLI_ASSOC);


    } else {
        mysqli_close($this->con);
        echo "No se pudieron obtener los datos, error: " . mysqli_error($this->con);
    }
}


public function desasociarElementoPrestamo(){
    $this->conectar();
    $desasociar_elemento=mysqli_prepare($this->con,"DELETE FROM `detalle_prestamo` WHERE id_prestamo=? and serial=?;
    ");
    $desasociar_elemento->bind_param('is',$this->id_prestamo,$this->serial);
$desasociar_elemento->execute();
       
        if ($desasociar_elemento) {
           return true;
        } else {
            echo "No se pudieron insertar los datos, error: " . mysqli_error($this->con);
        }
}






public function ObtenerCantidadElementosPrestamo() {
    $this->conectar();
    $detalle_prestamo = mysqli_prepare($this->con, "SELECT * FROM `usuario` INNER join prestamo on usuario.numero_documento =prestamo.numero_documento INNER JOIN detalle_prestamo on prestamo.id_prestamo =detalle_prestamo.id_prestamo INNER join elementos on elementos.serial =detalle_prestamo.serial INNER JOIN tipo_dispositivo on tipo_dispositivo.id_tipo_dispositivo=elementos.tipo_dispositivo WHERE detalle_prestamo.id_prestamo=?");
    $detalle_prestamo->bind_param('i', $this->id_prestamo);

    if ($detalle_prestamo->execute()) {


        $resultado = $detalle_prestamo->get_result();
        mysqli_close($this->con);
        return $resultado->fetch_all(MYSQLI_ASSOC);


    } else {
        mysqli_close($this->con);
        echo "No se pudieron obtener los datos, error: " . mysqli_error($this->con);
    }
}


public function modificarDetallePrestamoElemento() {
    $this->conectar();
    $mofificar_detalle_prestamo = mysqli_prepare($this->con, "UPDATE `detalle_prestamo` SET cargador=?,`mouse`=? WHERE `id_prestamo`=? and serial=?;");
    $mofificar_detalle_prestamo->bind_param('ssis',$this->cargador,$this->mouse, $this->id_prestamo,$this->serial);

    if ($mofificar_detalle_prestamo->execute()) {


    
        return true;


    } else {
        mysqli_close($this->con);
        echo "No se pudieron obtener los datos, error: " . mysqli_error($this->con);
        return false;
    }
}


public function obtenerDetallePorIdPrestamoSerial($serial,$id_prestamo) {
    $this->conectar();
    $detalle_prestamo_elemento = mysqli_prepare($this->con, "SELECT detalle_prestamo.serial,cargador,mouse,tipo_dispositivo.tipo_dispositivo FROM `detalle_prestamo` INNER JOIN elementos on elementos.serial=detalle_prestamo.serial INNER JOIN tipo_dispositivo ON tipo_dispositivo.id_tipo_dispositivo=elementos.tipo_dispositivo WHERE id_prestamo=? AND  detalle_prestamo.serial=?;");
    $detalle_prestamo_elemento->bind_param('is', $id_prestamo,$serial);

    if ($detalle_prestamo_elemento->execute()) {


        $resultado_prestamo = $detalle_prestamo_elemento->get_result();
        mysqli_close($this->con);
        return $resultado_prestamo->fetch_all(MYSQLI_ASSOC);


    } else {
        mysqli_close($this->con);
        echo "No se pudieron obtener los datos, error: " . mysqli_error($this->con);
    }
}







}




?>