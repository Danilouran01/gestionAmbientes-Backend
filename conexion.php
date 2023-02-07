<?php
    $mysqli = new mysqli("localhost", "root", "", "gestion_ambientes",3306);
    if ($mysqli->connect_errno) {
     echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    echo $mysqli->host_info . " Funciono la conexion\n";

 ?>
