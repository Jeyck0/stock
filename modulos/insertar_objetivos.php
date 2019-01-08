<?php

include ('../configs/conexion_db.php');

if(isset($_POST['insertar_objetivos'])):

    $numero = mysqli_escape_string($enlace, $_POST['id']);

    $id_profesional = mysqli_escape_string($enlace, $_POST['profesional']);
    $lugar_aula = mysqli_escape_string($enlace, $_POST['lugar_aula']);
    $txt_actividades = mysqli_escape_string($enlace, $_POST['txt_actividades']);
    $txt_observaciones = mysqli_escape_string($enlace, $_POST['txt_observaciones']);   
    $horas = mysqli_escape_string($enlace, $_POST['horas']);   

endif;

$sql="INSERT INTO planilla_planilla (id_planilla,id_profesional,actividades,observaciones,lugar_aula,horas_realizadas)VALUES('".$numero."','".$id_profesional."','".$txt_actividades."','".$txt_observaciones."','".$lugar_aula."','".$horas."')";


if(mysqli_query($enlace, $sql)):
    // $_SESSION['mensaje'] = '<div class="alert alert-success alert-dismissible" role="alert">
    // <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    // Alumno agregado con exito!</div>';
    header('Location: ../pages/lista_plantillas_pie.php');
    
    echo "agregado OK";
    echo $sql;
    
else:
    echo "Error";
    echo $sql;
endif;