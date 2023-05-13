<?php 

require_once  "./conexionPoo.php";


class AmbienteElemento extends Conexion{
    public  $id_ambiente_elemento;
    public $id_numero_ambiente;

    public $id_elemento_estatico;


    public function asociarAmbienteElemento(){

        $this->conectar();
        $asociar=mysqli_prepare($this->con,"INSERT INTO `ambiente_elemento` (`id_ambiente_elemento`, `id_numero_ambiente`, `id_elemento_estatico`) 
        VALUES (?, ?, ?);");
        $asociar->bind_param("iis", $this->id_ambiente_elemento,$this->id_numero_ambiente,$this->id_elemento_estatico);
        $asociar->execute();

        if ($asociar) {
            // echo "Datos insertados correctamente";
            return true;
        } else {
            echo "No se pudieron insertar los datos, error: " . mysqli_error($this->con);
            return false;
        }
        $this->con->close();
    }

    public function DesasociarElementoAmbiente($serial, $numero_ambiente)
    {
        $this->conectar();

        $eliminar_elemento = "DELETE FROM `ambiente_elemento` WHERE id_numero_ambiente=$numero_ambiente and id_elemento_estatico='$serial';
        ";

        $consulta_eliminar_elemento = $this->con->query($eliminar_elemento);

        if ($consulta_eliminar_elemento) {
            return true;
        } else {
            return false;
        }
    }

    public function CantidadElementoIdAmbiente($id)
    {
        $this->conectar();
        $elemento_cantidad = "SELECT categoria_elemento.nombre_categoria, COUNT(*) as cantidad_elementos FROM ambientes INNER JOIN ambiente_elemento on ambientes.id_numero_ambiente =ambiente_elemento.id_numero_ambiente INNER JOIN elementos_estaticos_ambiente on elementos_estaticos_ambiente.id_elemento_estatico=ambiente_elemento.id_elemento_estatico INNER JOIN categoria_elemento ON categoria_elemento.id_categoria=elementos_estaticos_ambiente.categoria_elemento INNER JOIN estado_elemento_estatico on estado_elemento_estatico.id_estado_estatico=elementos_estaticos_ambiente.estado WHERE ambiente_elemento.id_numero_ambiente=$id AND ambientes.id_numero_ambiente = $id GROUP BY categoria_elemento.nombre_categoria Order By categoria_elemento.nombre_categoria Asc ;";
        $cantidad_elemento_sql = $this->con->query($elemento_cantidad);
        return $cantidad_elemento_sql;
    }
}
