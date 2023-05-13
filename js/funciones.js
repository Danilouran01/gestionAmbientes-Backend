
function añadirObservaciones(id){
    let observacion = window.prompt("Ingrese sus observaciones");
    window.location.href = window.location.href + "?observacion=" + observacion + "&id=" + id ;
}

function observacionAñadida() {
    alert('observacion añadida con exito');
    
}





