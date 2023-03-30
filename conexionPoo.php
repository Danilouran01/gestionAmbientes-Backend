<?php


class Conexion{
    public $con;


    public function conectar(){
     $this->con=mysqli_connect("localhost", "root", "", "gestion_ambientes",3306);
     if ($this->con->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $this->con->connect_errno . ") " . $this->con->connect_error;
       }
    //    echo $this->con->host_info . " Funciono la conexion Poo\n";
    }
    
}




?>