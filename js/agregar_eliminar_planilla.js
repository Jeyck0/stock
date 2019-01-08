$(document).ready(function() {

  var num = $('.clonedInputDos').length; // how many "duplicatable" inputDos fields we currently have

  if (num-1 == 1)
        $('#btnDelDos').attr('disabled','disabled');

    // $('#btnDelDos').attr('disabled','disabled');
    $('#btnAddDos').click(function() {
      var num = $('.clonedInputDos').length;
      var newNum = new Number(num + 1); // the numeric ID of the new inputDos field being added
      r=newNum.toString();
      $('#bucle_profeDos').val(r);

      
   
      // create the new element via clone(), and manipulate it's ID using newNum value
      var newElem = $('#inputDos' + num).clone().attr('id', 'inputDos' + newNum);
   
      // manipulate the name/id values of the inputDos inside the new element
      newElem.children(':first').attr('id', 'nombre' + newNum).attr('name', 'nombre' + newNum);
   
      // insert the new element after the last "duplicatable" inputDos field
      $('#inputDos' + num).after(newElem);
   
      // enable the "remove" button
      $('#btnDelDos').attr('disabled',false);
     
   
      // business rule: you can only add 10 names
      if (newNum == 5)
        $('#btnAddDos').attr('disabled','disabled');

    });
   
    $('#btnDelDos').click(function() {
      var num = $('.clonedInputDos').length; // how many "duplicatable" inputDos fields we currently have
      $('#inputDos' + num).remove(); // remove the last element

      var r2=(num-1).toString();
   
      // enable the "add" button
      $('#btnAddDos').attr('disabled',false);
      $('#bucle_profeDos').val(r2);
   
      // if only one element remains, disable the "remove" button
      if (num-1 == 1)
        $('#btnDelDos').attr('disabled','disabled');
    });
   
  });

