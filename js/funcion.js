
  function confirmacionEliminar(){
    var respuesta=confirm("¿Esta seguro de eliminar el usuario?");
    if (respuesta==true) {
      return true;
      
    }else{
      return false;

    }
  }

  function confirmacionModificar(){
    var respuesta=confirm("¿Esta seguro de modificar el registro?");
    if (respuesta==true) {
      return true;
      
    }else{
      return false;

    }
  }

  function confirmacion(){
    var respuesta=confirm("¿Esta seguro de que quiere registrar otro administrador?");
    if (respuesta==true) {
      return true;
      
    }else{
      return false;

    }
  }

  function confirmacion1(){
    var respuesta=confirm("¿Esta seguro de que quiere cambiar su contraseña?");
    if (respuesta==true) {
      return true;
      
    }else{
      return false;

    }
  }



    document.getElementById("miBoton").classList.add("active");




  