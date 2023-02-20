<?php

include 

// Coincidir con cualquier carácter al menos una vez
$patron = '/./';
$cadena = 'hola mundo';
preg_match_all($patron, $cadena, $coincidencias);
print_r($coincidencias);

// ---------------------------------------------------------------------

// Validacion Usuarios

// El campo debe coincidir con un número de identificacion 
$patron = '/\(\d{3}\) \d{3}-\d{4}/';
$cadena = '(123) 456-7890';
preg_match($patron, $cadena, $coincidencias);
print_r($coincidencias);

// El nombre debe coincidir con un caracteres [aA_zZ]
$patron = '/\(\d{3}\) \d{3}-\d{4}/';
$cadena = '(123) 456-7890';
preg_match($patron, $cadena, $coincidencias);
print_r($coincidencias);

// El apellido debe coincidir con caracteres [aA_zZ]
$patron = '/\(\d{3}\) \d{3}-\d{4}/';
$cadena = '(123) 456-7890';
preg_match($patron, $cadena, $coincidencias);
print_r($coincidencias);

// Coincidir con nombre 
$patron = '/\(\d{3}\) \d{3}-\d{4}/';
$cadena = '(123) 456-7890';
preg_match($patron, $cadena, $coincidencias);
print_r($coincidencias);

// Coincidir con un número de teléfono en formato (XXX) XXX-XXXX
$patron = '/\(\d{3}\) \d{3}-\d{4}/';
$cadena = '(123) 456-7890';
preg_match($patron, $cadena, $coincidencias);
print_r($coincidencias);

// Coincidir con un número de teléfono en formato (XXX) XXX-XXXX
$patron = '/\(\d{3}\) \d{3}-\d{4}/';
$cadena = '(123) 456-7890';
preg_match($patron, $cadena, $coincidencias);
print_r($coincidencias);




?>