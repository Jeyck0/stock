$(document).ready(function() {

    var num = $('.cantidadEspecial').length; // how many "duplicatable" input fields we currently have
    r=num.toString();
    $('#especial').val(r);

    // console.log(r);

    if(r == 5){
      $('#agregarDos').attr('disabled','disabled');
      $('#nuevoEspecial').attr('disabled','disabled');
    }

  });