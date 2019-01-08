<?php

include ('../configs/conexion_db.php');

if(isset($_POST['insertar_resumen'])):

    $numero = mysqli_escape_string($enlace, $_POST['id']);
    $swich = mysqli_escape_string($enlace, $_POST['swich']);

    $txt_antecedentes_1 = mysqli_escape_string($enlace, $_POST['txt_antecedentes_1']);
    $txt_antecedentes_2 = mysqli_escape_string($enlace, $_POST['txt_antecedentes_2']);
    $txt_valoracion = mysqli_escape_string($enlace, $_POST['txt_valoracion']);
    $txt_evaluacion = mysqli_escape_string($enlace, $_POST['txt_evaluacion']);
    $txt_familiar_1 = mysqli_escape_string($enlace, $_POST['txt_familiar_1']);  
    $txt_familiar_2 = mysqli_escape_string($enlace, $_POST['txt_familiar_2']);
    $txt_escolar_1 = mysqli_escape_string($enlace, $_POST['txt_escolar_1']); 
    $txt_escolar_2 = mysqli_escape_string($enlace, $_POST['txt_escolar_2']);
    $txt_observaciones = mysqli_escape_string($enlace, $_POST['txt_observaciones']);

    $carpeta ="../uploads/";
    $destino= $carpeta.$_FILES['file-upload'] ['name'];
    copy($_FILES['file-upload'] ['tmp_name'],$destino);
    $nombre =$_FILES['file-upload'] ['name'];
    $ruta= "../uploads/".$nombre;



endif;

$sql="INSERT INTO planilla_planilla (id_planilla,antecedentes1,antecedentes2,valoracion,evaluacion,familiar1,familiar2,escolar1,escolar2,observaciones_2)VALUES('".$numero."','".$txt_antecedentes_1."','".$txt_antecedentes_2."','".$txt_valoracion."','".$txt_evaluacion."','".$txt_familiar_1."','".$txt_familiar_2."','".$txt_escolar_1."','".$txt_escolar_2."','".$txt_observaciones."')";
$sql2="UPDATE planilla_planilla SET swich='1' WHERE id_planilla ='$numero'";
$sql3="INSERT INTO planilla_planilla (id_planilla,evidencia) VALUES ('".$numero."','".$ruta."')";


if(mysqli_query($enlace, $sql) && mysqli_query($enlace, $sql2) && mysqli_query($enlace, $sql3)):
    // $_SESSION['mensaje'] = '<div class="alert alert-success alert-dismissible" role="alert">
    // <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    // Alumno agregado con exito!</div>';
    header('Location: ../pages/lista_plantillas_pie.php');
    
    // echo "agregado OK";
    // echo $sql;
    
else:
    echo "Error";
    echo $sql3;
    // echo $sql;
endif;