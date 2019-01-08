$(document).ready(function() {

    var num = $('.cantidadDocentes').length; // how many "duplicatable" input fields we currently have
    r=num.toString();
    $('#cantidadDocentes').val(r);

    // console.log(r);

    if(r == 5){
      $('#agregar').attr('disabled','disabled');
      $('#nuevoDocente').attr('disabled','disabled');
    }

  });