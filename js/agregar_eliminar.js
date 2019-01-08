$(document).ready(function() {
    $('#btnDel').attr('disabled','disabled');
    $('#btnAdd').click(function() {
      var num = $('.clonedInput').length; // how many "duplicatable" input fields we currently have
      var newNum = new Number(num + 1); // the numeric ID of the new input field being added
      r=newNum.toString();
      $('#bucle_profe').val(r);
      
   
      // create the new element via clone(), and manipulate it's ID using newNum value
      var newElem = $('#input' + num).clone().attr('id', 'input' + newNum);
   
      // manipulate the name/id values of the input inside the new element
      newElem.children(':first').attr('id', 'nombre' + newNum).attr('name', 'nombre' + newNum);
   
      // insert the new element after the last "duplicatable" input field
      $('#input' + num).after(newElem);
   
      // enable the "remove" button
      $('#btnDel').attr('disabled',false);
     
   
      // business rule: you can only add 10 names
      if (newNum == 5)
        $('#btnAdd').attr('disabled','disabled');

    });
   
    $('#btnDel').click(function() {
      var num = $('.clonedInput').length; // how many "duplicatable" input fields we currently have
      $('#input' + num).remove(); // remove the last element

      var r2=(num-1).toString();
   
      // enable the "add" button
      $('#btnAdd').attr('disabled',false);
      $('#bucle_profe').val(r2);
   
      // if only one element remains, disable the "remove" button
      if (num-1 == 1)
        $('#btnDel').attr('disabled','disabled');
    });
   
  });

