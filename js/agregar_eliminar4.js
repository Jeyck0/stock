$(document).ready(function () {
    $('#emptyar').attr('disabled', 'disabled');
    $('#addear').click(function () {
        // $("#select_profesional").attr("name",'select_profesional_1');
        var num = $('.clonar2').length; // how many "duplicatable" div fields we currently have
        var newNum = new Number(num + 1); // the numeric ID of the new div field being added
        r=newNum.toString();
        $('#bucle_alumno').val(r);

        // create the new element via clone(), and manipulate it's ID using newNum value
        var newElem = $('#divAl' + num).clone().attr('id', 'divAl' + newNum);

        // manipulate the name/id values of the div inside the new element
        newElem.children(':first').attr('id', 'alumno' + newNum).attr('name', 'alumno' + newNum);


        // insert the new element after the last "duplicatable" div field
        $('#divAl' + num).after(newElem);

        // enable the "remove" button
        $('#emptyar').attr('disabled', false);

        // business rule: you can only add 10 names
        if (newNum == 5)
            $('#addear').attr('disabled', 'disabled');
    });

    $('#emptyar').click(function () {
        var num = $('.clonar2').length; // how many "duplicatable" div fields we currently have
        $('#divAl' + num).remove(); // remove the last element
        var r2=(num-1).toString();

        // enable the "add" button
        $('#addear').attr('disabled', false);
        $('#bucle_alumno').val(r2);
        // if only one element remains, disable the "remove" button
        if (num - 1 == 1)
            $('#emptyar').attr('disabled', 'disabled');
    });

});