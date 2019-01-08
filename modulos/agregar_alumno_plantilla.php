<?php
include ("../configs/conexion_db.php");
if(isset($_POST['btn-submit'])){
$alumno_1=mysqli_escape_string($enlace, $_POST['alumno1']);
$alumno_2=mysqli_escape_string($enlace, $_POST['alumno2']);
}

echo $alumno_1." ".$alumno_2;

$sql="INSERT INTO datos_plantilla (alumno_id ,alumno_id_2)VALUES ('".$alumno_1."','".$alumno_2."') ";
echo $sql;

if(mysqli_query($enlace, $sql)):
    echo "agregado OK";
    
else:
    echo "error";
endif;
