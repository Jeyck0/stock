function select_profesional()
{ //id="select_usuario"
  
 var id =  $("#select_profesional").val();
    //alert("Hola select = "+id);

    var ob = {id:id};

     $.ajax({
                type: "POST",
                url:"../modulos/mostrar_datos_profesional.php",
                data: ob,
                beforeSend: function(objeto){
                
                },
                success: function(data)
                { 
                 
                 $("#panel_profesional").html(data);
            
                }
             });

}