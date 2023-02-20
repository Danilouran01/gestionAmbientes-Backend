<?php
session_start();
if(!isset($_SESSION['numero_documento'])){
    header('location: ../index.php');
}
?>
