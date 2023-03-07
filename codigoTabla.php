<?php
require_once "./classPrestamo.php";

session_start();
if(!isset($_SESSION['numero_documento'])){
    header("location: index.php");
};

$estadoPrestamo = new Prestamo();
$mostrar_prestamos = $estadoPrestamo->obtenerPrestamosActivosInactivos("activo");

function Ver_Prestamos(){

    require_once "./classPrestamo.php";

$estadoPrestamo = new Prestamo();
$mostrar_prestamos = $estadoPrestamo->obtenerPrestamosActivosInactivos("activo");


    echo '<table class="table">';
    echo '<thead>';
        echo '<tr>';
           echo ' <th scope="col">Id prestamo</th>';
           echo '<th scope="col">Hora entrega</th>';
            echo '<th scope="col">Fecha prestamo</th>';
            echo '<th scope="col">observaciones</th>';
            echo '<th scope="col">Hora prestamo</th>';
            echo '<th scope="col">Ambiente</th>';
            echo '<th scope="col">Fecha entrega</th>';
            echo '<th scope="col">Responsable</th>';
            echo '<th scope="col">Estado</th>';
            echo '<th scope="col">Acciones</th>';


        echo'</tr>';
    echo'</thead>';
    echo'<tbody>';


        while ($rows = $mostrar_prestamos->fetch_assoc()) {


            echo'<tr>';

               echo" <td>" . $rows['id_prestamo']    ."</td>";
               echo" <td> " .$rows['fecha_prestamo']    ."</td>";
               echo" <td> ". $rows['hora_prestamo']    . "</td>";
               echo "<td> ". $rows['id_numero_ambiente']   ." </td>";
                echo "<td>".$rows['fecha_entrega']   ."</td>";
                echo"<td> ".$rows['fecha_entrega']    ."</td>";
                echo"<td>". $rows['numero_documento']    ."</td>";
               echo"<td> ".$rows['observaciones']  ."</td>";
               echo"<td> ". $rows['estado_prestamo'] ."</td>";



       


                echo '<td><a class="btn btn-info bg-success" href="añadirObservacion.php?idprestamo=' . urlencode($rows['id_prestamo']) . '" style="color:white">observacion</a>';

                echo '<a class="btn btn-info bg-success" href="cerrarPrestamoAmbiente.php?idprestamo=' . urlencode($rows['id_prestamo']) . '&idAmbiente='. urlencode($rows['id_numero_ambiente']) .'" style="color:white">Entregar</a>';

        
                
                
                
                
                echo '</td>';



               
                    
                 
         
             








          echo "</tr>";


        }







   echo ' </tbody>';
echo '</table>';


}






?>