function validar(){
    var usuario, password;
    usuario = document.getElementById("usuario").value;
    password = document.getElementById("password").value;

    if (usuario === "" || password === ""){
        alert("Todos los campos son obligatorios");
        return false;
    }
    else if(rut.length>10){
        alert("El rut es muy largo");
        return false;
    }
    else if(nombres.length>50){
        alert("El nombre es muy largo");
        return false;
    }
    else if(apellidos.length>50){
        alert("El apellidos es muy largo");
        return false;
    }
    else if(ciudad.length>50){
        alert("La ciudad es muy largo");
        return false;
    }
    else if(direccion.length>50){
        alert("La direccion es muy largo");
        return false;
    }
    else if(telefono.length>9){
        alert("El telefono es muy largo");
        return false;
    }
    else if(curso.length>2){
        alert("El curso es muy largo");
        return false;
    }
}