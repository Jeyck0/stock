<?php
include ("../configs/conexion_db.php");
if(isset($_POST['numero'])){

$numero = '';

}

// echo $alumno_1." ".$alumno_2;

$sql="INSERT INTO planilla (id)VALUES ('".$numero."') ";

if(mysqli_query($enlace, $sql)){
    header('Location: ../pages/llenar_plantilla_pie.php'); 
}
    

else{
    /**header('Location: ../tablaAlumno.php?error'); */
    echo 'Error vuelva a intentarlo';
}
