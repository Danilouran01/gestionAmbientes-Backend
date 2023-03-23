
function confirmaradmin(){
  

 clave=prompt("intruduce tu clave ");
 
 if (respuesta==true) {

  
   return true;
   
 }else{
   return false;

 }
}



function confirmaradmin(){


clave=prompt("intruduce tu clave ");

if (clave==true ) {


return true;

}else{
return false;

}
}

function pregunta()
    {
    var mensaje = 'Son correctos los datos?, BANCO: <?php echo $banco; ?>    CUENTA: <?php echo $cuenta; ?>    CLABE:     ¿Deseas terminar?';
    var opcion = confirm(mensaje);
    if (opcion == true) { 
       //confirmado
        alert('datos procesados !!');
    } else {
        //cancelado
        alert('proceso cancelado !!');
    }
}