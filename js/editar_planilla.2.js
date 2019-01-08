$(document).ready(function() {

    var num = $('.cantidadAsistente').length; // how many "duplicatable" input fields we currently have
    r=num.toString();
    $('#asistente').val(r);

    // console.log(r);

    if(r == 5){
      $('#agregarTres').attr('disabled','disabled');
      $('#nuevoAsistente').attr('disabled','disabled');
    }

  });