<?php
require_once ("../configs/conexion_db.php");

if(isset($_POST['actualizar_resumen'])):
    $antecedentes1 = mysqli_escape_string($enlace, $_POST['txt_antecedentes_1']);
    $antecedentes2 = mysqli_escape_string($enlace, $_POST['txt_antecedentes_2']);
    $valoracion = mysqli_escape_string($enlace, $_POST['txt_valoracion']);
    $evaluacion = mysqli_escape_string($enlace, $_POST['txt_evaluacion']);
    $familiar1 = mysqli_escape_string($enlace, $_POST['txt_familiar_1']);
    $familiar2 = mysqli_escape_string($enlace, $_POST['txt_familiar_2']);
    $escolar1 = mysqli_escape_string($enlace, $_POST['txt_escolar_1']);
    $escolar2 = mysqli_escape_string($enlace, $_POST['txt_escolar_2']);
    $observaciones = mysqli_escape_string($enlace, $_POST['txt_observaciones']);

    $id = mysqli_escape_string($enlace, $_POST['id']);
    $id2 = mysqli_escape_string($enlace, $_POST['numero']);
    

endif;

    $sql = "UPDATE planilla_planilla SET antecedentes1 = '$antecedentes1', antecedentes2 = '$antecedentes2', valoracion = '$valoracion', 
    evaluacion = '$evaluacion', familiar1 = '$familiar1', familiar2 = '$familiar2', escolar1 = '$escolar1', 
    escolar2 = '$escolar2', observaciones_2 = '$observaciones' WHERE id = '$id2'";



    if(mysqli_query($enlace, $sql)):
        header('Location: ../pages/editar_resumen.php?id='.$id.'?successo');
        echo "ok";
        
    else:
        header('Location: ../pages/editar_resumen.php?id='.$id.'?error');
    endif;

